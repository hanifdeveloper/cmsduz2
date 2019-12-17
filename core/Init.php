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

class Init {

	public function __construct() {
		$this->loadModule();
		$app = new App();
		
		if($app->isAdmin)
			$this->backend($app);
		else
			$this->frontend($app);
	}

	private function backend($app) {
		// Check Session Login
		$session = $app->getSession('USER_SESSION');
		if(empty($session) && $app->module !== 'script'){
			$app->module = 'login';
		}

		// Redirect jika session ada
		if(!empty($session) && $app->module == 'login'){
			echo '<meta http-equiv="refresh" content="0;URL=\''.$app->adminUrl.'\'" />';
			die;
		}

		// Destroy Session jika logout
		if(!empty($session) && $app->module == 'logout'){
			$app->desSession();
			echo '<meta http-equiv="refresh" content="0;URL=\''.$app->adminUrl.'\'" />';
			die;
		}

		// Get Module
		$modulePath = APP . '_backend/' . $app->module . '.php';
		if(file_exists($modulePath)) {
			require_once $modulePath;
			$module = new $app->module($app);
			$method = $app->method;
			$params = $app->params;

			// Get Method
			if(method_exists($module, $method)) {
				call_user_func_array([$module, $method], $params);
			} else {
				$app->module = 'main';
				$app->showView('error', array('error_message' => 'Method Not Founds'));
			}
		}
		else{
			$app->module = 'main';
			$app->showView('error', array('error_message' => 'Module Not Founds'));
		}
	}

	private function frontend($app) {
		// Check Main Module
		if(in_array($app->module, ['home', 'beranda', 'dashboard'])){
			$app->module = 'main';
		}
		
		// Get Module
		$modulePath = APP . '_frontend/' . $app->module . '.php';
		if(file_exists($modulePath)) {
			require_once $modulePath;
			$module = new $app->module($app);
			$method = $app->method;
			$params = $app->params;
		}
		else{
			$app->module = 'main';
			$app->showView('error', array('error_message' => 'Module Not Founds'));
		}
	}

	private function loadModule() {
		require_once 'App.php';
		require_once 'Module.php';
		require_once 'Database.php';
	}

}

new Init();
?>
