<?php
/**
 * CMSDuz v2
 *
 * @Author  	: M. Hanif Afiatna <hanif.softdev@gmail.com>
 * @Since   	: version 4.1.0
 * @Date		: 04 Desember 2019
 * @package 	: Core System
 * @Description : 
 */

class Database {
	
	const SINGLE_DATA = 0;
	const ALL_DATA = 1;

	private $config = [];
	private $con = '';
	private $db = null;
	private $defaultValue = [];
	private $databaseConfig = [];
	public $baseUrl = '';
	
	public function __construct() {
		
	}

	private function getComponent() {
		if($handle = opendir(COMP)) {
			while (false !== ($file = readdir($handle))) {
				if (preg_match('/.php\z/i', $file)) {
					require_once COMP . $file;
				}
			}
			closedir($handle);
		}
	}

	private function openConnection() {
		if(isset($this->databaseConfig[$this->con]) && !empty($this->databaseConfig[$this->con])){
			$this->defaultValue = $this->databaseConfig[$this->con]['defaultValue'];
			$dsn = $this->databaseConfig[$this->con]['driver'] . 
				   ':host=' . $this->databaseConfig[$this->con]['host'] . 
				   ';port=' . $this->databaseConfig[$this->con]['port'] . 
				   ';dbname=' . $this->databaseConfig[$this->con]['dbname'];	
			$opt[PDO::ATTR_PERSISTENT] = $this->databaseConfig[$this->con]['persistent'];
			try{$this->db = new PDO($dsn, $this->databaseConfig[$this->con]['user'], $this->databaseConfig[$this->con]['password'], $opt);}
			catch(PDOexception $err){
				header("HTTP/1.1 503");
		        header("Content-Type:application/json");
				$errorMsg = array(
					'status' => 'error', 
					'message' => array(
						'title' => 'Maaf', 
						'text' => $err->getMessage(), 
						'type' => 'error'
					),
				);
		        echo json_encode($errorMsg);
				die;
			}
		}else{
			header("HTTP/1.1 503");
	        header("Content-Type:application/json");
			$errorMsg = array(
				'status' => 'error', 
				'message' => array(
					'title' => 'Maaf', 
					'text' => $this->con.' belum dikonfigurasikan silahkan check di file app/config.php', 
					'type' => 'error'
				),
			);
	        echo json_encode($errorMsg);
			die;
		}
	}
	
	private function closeConnection() {
		$this->db = null;
	}
	
	private function sql_debug($sql_string, array $params = null) {
		if(!empty($params)){
			$indexed = $params == array_values($params);
			foreach($params as $k=>$v){
				if (is_object($v)){
					if ($v instanceof \DateTime) $v = $v->format('Y-m-d H:i:s');
					else continue;
				}
				else if(is_string($v)) $v="'$v'";
				else if($v === null) $v='NULL';
				else if(is_array($v)) $v = implode(',', $v);
	
				if($indexed){
					$sql_string = preg_replace('/\?/', $v, $sql_string, 1);
				}
				else{
					if($k[0] != ':') $k = ':'.$k;
					$sql_string = str_replace($k,$v,$sql_string);
				}
			}
		}
		return $sql_string;
	}

	protected function setConnection($con) {
		$this->con = $con;
		$this->config = Module::loadConfig();
		$this->databaseConfig = $this->config['database'];
		$this->baseUrl = '//' . $_SERVER['HTTP_HOST'];
		$this->files = Module::LoadFiles();
		$this->getComponent();
		if(!empty($this->config['setting'])) {
			foreach($this->config['setting'] as $set => $value) $this->{$set} = $value;
		}
	}

	public function paramsFilter($params, $input) {
		foreach ($input as $key => $value) { if(isset($input[$key])) $params[$key] = $input[$key]; }
		return $params;
	}

	public function getResponseMessage($module){
		if(isset($this->databaseConfig[$this->con]) && !empty($this->databaseConfig[$this->con]))
			return $this->databaseConfig[$this->con]['responseMessage'][strtolower($module)];
		else
			return array();
	}

	public function getData($query, $arrData = array(), $allData = self::ALL_DATA) {
		set_time_limit(0);
		if(is_null($this->db)) $this->openConnection();
		$sql_stat = $this->db->prepare($query);
		$sql_stat->execute($arrData);
		$sql_value = ($allData == self::ALL_DATA) ? $sql_stat->fetchAll(PDO::FETCH_ASSOC) : $sql_stat->fetch(PDO::FETCH_ASSOC);
		$sql_count = $sql_stat->rowCount();		
		$sql_query = $this->sql_debug($query, $arrData);
		$this->closeConnection();
		return array(
			'value' => $sql_value,
			'count' => $sql_count,
			'query' => $sql_query.';',
		);
	}
	
	public function getTabel($tabel) {
		set_time_limit(0);
		$result = $this->getData('SHOW COLUMNS FROM '.$tabel);
		$defaultValue = $this->defaultValue;
		$dataTabel = array();
		foreach($result['value'] as $kol){$dataTabel[$kol['Field']] = '';}
		foreach($dataTabel as $key => $value){if(isset($defaultValue[$key])) $dataTabel[$key] = $defaultValue[$key];}
		return $dataTabel;
	}
	
	public function getDataTabel($tabel, $id = array()) {
		set_time_limit(0);
		if(!empty($id)){
			$data = $this->getData('SELECT * FROM '.$tabel.' WHERE ('.$id[0].' = ?) ', array($id[1]));
			if($data['count'] > 0) $result =  $data['value'][0];
			else $result = $this->getTabel($tabel);
		}
		else
			$result = $this->getTabel($tabel);
		return $result;
	}

	public function getAutoKode($id, $tabel){
		set_time_limit(0);
        $data = $this->getTabel($tabel);
        $kode = explode('.', $data[$id]);
        $dataTabel = $this->getData('SELECT * FROM '.$tabel.' WHERE ('.$id.' LIKE ?) ORDER BY '.$id.' DESC LIMIT 1', array($kode[0].'%'));
        if($dataTabel['count'] > 0){
            $kode = explode('.', $dataTabel['value'][0][$id]);
            $number = intval($kode[1])+1;
            $data[$id] = $kode[0].'.'.sprintf('%0'.strlen($kode[1]).'s', $number);
        }else{
            $data[$id] = $kode[0].'.01';
        }
        return $data;
    }
	
	public function save($tabel, $arrData) {
		if(is_null($this->db)) $this->openConnection();
		foreach($arrData as $key => $value) $keys[] = ':' . $key;
		$valTable = implode(', ',$keys);
		$query = 'INSERT INTO ' . $tabel . ' VALUES (' . $valTable . ')';
		$success = 0;
		$message = '';
		try{
			$sql_stat = $this->db->prepare($query);
			$success = $sql_stat->execute($arrData);
			$message = $sql_stat->errorInfo()[2];
		}
		catch(Exception $err){}
		$this->closeConnection();
		$sql_query = $this->sql_debug($query, $arrData);
		return array(
			'success' => $success,
			'message' => $message,
			'query' => $sql_query.';',
		);
	}
	
	public function save_update($tabel, $arrData){
		if(is_null($this->db)) $this->openConnection();
		foreach($arrData as $key => $value) $keys[] = $key . '= :' . $key;
		$valTable = implode(', ',$keys);
		$query = 'INSERT INTO ' . $tabel . ' SET ' . $valTable . ' ON DUPLICATE KEY UPDATE ' . $valTable;
		$success = 0;
		$message = '';
		try{
			$sql_stat = $this->db->prepare($query);
			// $sql_stat->bindParam(':isi_berita', $arrData['isi_berita'], PDO::PARAM_STR);
			$success = $sql_stat->execute($arrData);
			$message = $sql_stat->errorInfo()[2];
		}
		catch(Exception $err){}
		$this->closeConnection();
		$sql_query = $this->sql_debug($query, $arrData);
		return array(
			'success' => $success,
			'message' => $message,
			'query' => $sql_query.';',
		);
	}
	
	public function update($tabel, $arrData, $idKey) {
		if(is_null($this->db)) $this->openConnection();
		foreach($arrData as $key => $value) $keys1[] = $key . ' = :' . $key;
		$valTable = implode(', ',$keys1);
		foreach($idKey as $key => $value) $keys2[] = '(' . $key . '= :' . $key .')';
		$keyTable = implode(' AND ',$keys2);
		$query = 'UPDATE ' . $tabel . ' SET ' . $valTable . ' WHERE ' . $keyTable;
		$success = 0;
		$message = '';
		try{
			$sql_stat = $this->db->prepare($query);
			$success = $sql_stat->execute(array_merge($arrData, $idKey));
			$message = $sql_stat->errorInfo()[2];
		}
		catch(Exception $err){}
		$this->closeConnection();
		$sql_query = $this->sql_debug($query, array_merge($arrData, $idKey));
		return array(
			'success' => $success,
			'message' => $message,
			'query' => $sql_query.';',
		);
	}
	
	public function delete($tabel, $idKey) {
		if(is_null($this->db)) $this->openConnection();
		foreach($idKey as $key => $value) $keys[] = '(' . $key . '= :' . $key .')';
		$keyTable = implode(' AND ',$keys);
		$query = 'DELETE FROM ' . $tabel . ' WHERE ' . $keyTable;
		$success = 0;
		$message = '';
		try{
			$sql_stat = $this->db->prepare($query);
			$success = $sql_stat->execute($idKey);
			$message = $sql_stat->errorInfo()[2];
		}
		catch(Exception $err){}
		$this->closeConnection();
		$sql_query = $this->sql_debug($query, $idKey);
		return array(
			'success' => $success,
			'message' => $message,
			'query' => $sql_query.';',
		);
	}
	
}

?>
