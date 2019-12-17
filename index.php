<?php
/**
 * CMSDuz v2
 *
 * @Author  	: M. Hanif Afiatna <hanif.softdev@gmail.com>
 * @Since   	: version 4.1.0
 * @Date		: 04 Desember 2019
 * @package 	: core system
 * @Description : 
 */

// Set default timezone
date_default_timezone_set('Asia/Jakarta');
define('APP', dirname(__FILE__) . '/app/');
define('COMP', dirname(__FILE__) . '/comp/');
define('CORE', dirname(__FILE__) . '/core/');
define('UPLOAD', dirname(__FILE__) . '/upload/');
define('TEMPLATE', dirname(__FILE__) . '/template/');
define('COOKIE_EXP', (3600 * 24)); // 24 Jam / 1 Hari
// Running Application
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once CORE . 'init.php';
?>
