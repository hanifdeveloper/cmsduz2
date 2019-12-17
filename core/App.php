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

class App {

	public $module = 'main';
	public $method = 'index';
	public $params = [];
	public $config = [];
	public $baseUrl = '';
	public $adminUrl = '';
	public $activeUrl = '';
	public $templateUrl = '';
	public $templatePath = '';
	public $statusPath = '';
	public $viewPath = '';
	public $cssPath = '';
	public $jsPath = '';
	public $isAdmin = false;

	public function __construct() {
        $this->config = Module::loadConfig();
		$this->baseUrl = '//' . $_SERVER['HTTP_HOST'];
		$this->activeUrl = '//' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $this->templateUrl = $this->config['template']['frontend'];
        $this->files = Module::LoadFiles();
        
		$this->getUrl();
		$this->getComponent();
		if(!empty($this->config['setting'])) {
			foreach($this->config['setting'] as $set => $value) $this->{$set} = $value;
		}
		if(!empty($this->config['navbar'])) {
			foreach($this->config['navbar'] as $set => $value) $this->{'navbar_'.$set} = $value;
        }
	}

	public function getUrl() {
		if(isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);

			$admin_path = $this->config['setting']['admin_path'];
			if($url[0] == $admin_path) {
				array_shift($url);
				$this->adminUrl = $this->baseUrl . '/' . $admin_path;
				$this->templateUrl = $this->config['template']['backend'];
				$this->isAdmin = true;
			}

			$this->module = isset($url[0]) ? $url[0] : $this->module;
			unset($url[0]);
			$this->method = isset($url[1]) ? $url[1] : $this->method;
			unset($url[1]);
			$this->params = array_values($url);
		}
		
		$this->statusPath = ($this->isAdmin) ? 'backend' : 'frontend';
	}

	public function getComponent() {
		if($handle = opendir(COMP)) {
			while (false !== ($file = readdir($handle))) {
				if (preg_match('/.php\z/i', $file)) {
					require_once COMP . $file;
				}
			}
			closedir($handle);
		}
	}

	public function getModule($module) {
		// Get Module
		$modulePath = APP . '_' . $this->statusPath . '/' . $module . '.php';
		if(file_exists($modulePath)) {
			require_once $modulePath;
			return new $module($this);
		}
		else{
			echo 'Module Not Founds';
		}
	}

	public function setSession($name, $data) {
		$_SESSION[$this->config['project']][$name] = $data;
	}

	public function getSession($name) {
		return isset($_SESSION[$this->config['project']][$name]) ? $_SESSION[$this->config['project']][$name] : '';
	}

	public function delSession($name) {
		if(isset($_SESSION[$this->config['project']][$name])) unset($_SESSION[$this->config['project']][$name]);
	}

	public function desSession() {
		if(isset($_SESSION[$this->config['project']])) unset($_SESSION[$this->config['project']]);
	}

	public function showView($fileView, $data = array()) {
		extract($data, EXTR_SKIP);
		$this->viewPath = APP . '_' . $this->statusPath . '/_view/' . $this->module . '/' . $fileView . '.' . $this->statusPath . '.php';
		$this->templatePath = $this->baseUrl . '/template/' . $this->templateUrl['basePath'];

        foreach ($this->templateUrl['css'] as $key => $value) {
            $this->cssPath .= '<link rel="stylesheet" href="' . $this->templatePath . $value . '">'."\n";
        };

        foreach ($this->templateUrl['js'] as $key => $value) {
            $this->jsPath .= '<script src="' . $this->templatePath . $value . '"></script>'."\n";
        };

		require_once TEMPLATE . $this->templateUrl['basePath'] . 'index.php';
		unset($data);
	}
	
	public function subView($fileView, $data = array()) {
		extract($data, EXTR_SKIP);
		$this->viewPath = APP . '_' . $this->statusPath . '/_view/' . $fileView . '.' . $this->statusPath . '.php';
		$this->templatePath = $this->baseUrl . '/template/' . $this->templateUrl['basePath'];
		require $this->viewPath;
		unset($data);
	}

	public function debugResponse($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function showResponse($errorMsg, $code = 200) {
        header("HTTP/1.1 ".$code);
        header("Content-Type:application/json");
        echo json_encode($errorMsg);
	}
	
	public function createCookie($session) {
        $cookie = $this->cookie;
        setcookie($cookie, $session, time() + COOKIE_EXP, '/');
    }
    
    public function removeCookie() {
        $cookie = $this->cookie;
        unset($_COOKIE[$cookie]);
        setcookie($cookie, '', time() - COOKIE_EXP, '/');
    }

    public function createQuery($data) {
        $result = array();
        foreach ($data as $key => $value) { $query = '('.$value.' LIKE ?)'; array_push($result, $query);}
        return implode(' AND ', $result);
    }

    public function convertIndexToAssoc($format, $data) {
		$index = 0;
		foreach ($format as $key => $val) {$format[$key] = $data[$index++];}
		return $format;
	}

	public function isAssoc(array $arr) {
        if(array() == $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
	}
	
	public function extractJSON($data, $link = true) {
		foreach ($data as $key => $value) {
			if(!is_array($value)){
				$json = json_decode($value, true);
				if($json) $data[$key] = $json;
			}

			// Create link
			if($link){
				foreach ($this->berkas_file as $keys => $values) {
					if(($key == $values) && !empty($value)) $data[$key] = '(Download: <a href="'.$this->link_file_lampiran.$value.'" target="_blank">'.$value.'</a>)';
				}
			}
		}
		return $data;
	}

    public function uploadImage($file, $folder = '', $action = ''){
        ini_set('memory_limit', '-1');
        $result['status'] = 'success';
        $result['errorMsg'] = 'file tidak dilampirkan';
        $result['UploadFile'] = '';
        if(!empty($file['name'])){
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = date('dmYHis').'.'.$ext;
            $opt_upload = array(
                'fileName' => 'temp_'.$fileName,
                'fileType' => $this->file_type_image,
                'maxSize' => $this->max_size,
                'folder' => $this->dir_upload_image.'/'.$folder,
                'session' => false,
            );
            $result = $this->files->upload($file, $opt_upload);
            if($result['status'] == 'success'){
                $src = $this->dir_upload_image.'/'.$folder.'/'.$result['UploadFile'];
                $dst = $this->dir_upload_image.'/'.$folder.'/'.$fileName;
                $result['UploadFile'] = $fileName;
                if($action == '' | $action == 'resize') {
                    FUNC::resizeImage(800, $src, $ext, $dst);
                }else if($action == 'crop'){
                    FUNC::cropImage(400, $src, $ext, $dst);
                }else if($action == 'thumb'){
                    FUNC::thumbsImage(400, 400, $src, $ext, $dst);
                }
            }
        }
        return $result;
    }

    public function uploadLampiran($file, $folder = ''){
        ini_set('memory_limit', '-1');
        $result['status'] = 'success';
        $result['errorMsg'] = 'file tidak dilampirkan';
        $result['UploadFile'] = '';
        if(!empty($file['name'])){
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = date('dmYHis').'.'.$ext;
            $opt_upload = array(
                'fileName' => 'temp_'.$fileName,
                'fileType' => $this->file_type_lampiran,
                'maxSize' => $this->max_size,
                'folder' => $this->dir_upload_lampiran.'/'.$folder,
                'session' => false,
            );
            $result = $this->files->upload($file, $opt_upload);
        }
        return $result;
    }

    public function FileExists($file, $action = '') {
        $exist = false;
        if(file_exists($file)) $exist = true;
        if($exist == true && $action == 'delete') unlink($file);
        return $exist;
    }

    public function sendPostMessage($data) {
        /**
         * Single Upload
         * $ curl -F 'img_avatar=@/home/petehouston/hello.txt' http://localhost/upload
         * 
         * Multiple Upload
         * $ curl -F 'fileX=@/path/to/fileX' -F 'fileY=@/path/to/fileY' ... http://localhost/upload
         * 
         * Array Upload
         * $ curl -F 'files[]=@/path/to/fileX' -F 'files[]=@/path/to/fileY' ... http://localhost/upload
         */
        
        /**
         * Params:
         * $data['url']
         * $data['header']
         * $data['fields']
         */
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $data['url']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data['header']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data['fields']);
        $result = curl_exec($ch);           
        if($result === FALSE){
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

}

?>
