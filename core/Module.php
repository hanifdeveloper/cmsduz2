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

class Module {

	private static $config = array();
	private static $service = array();
	private static $files = array();
	
	public static function loadConfig(){
		if(empty(self::$config)){
			$dataArr = require_once APP . 'config.php';
			self::$config = $dataArr;
			return $dataArr;
		}
		else{
			return self::$config;
		}
    }
    
    public static function LoadService($name){
		if(!isset(self::$service[$name])){
			require_once APP . '_service/' . $name . '.php';
			self::$service[$name] = new $name();
			return self::$service[$name];
		}
		else{
			return self::$service[$name];
		}
	}

	public static function LoadFiles(){
		if(empty(self::$files)){
			require_once CORE . 'Files.php';
			self::$files = new Files();
			return self::$files;
		}
		else{
			return self::$files;
		}
	}

}

?>
