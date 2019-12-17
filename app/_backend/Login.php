<?php

class Login {

    public function __construct($app) {
        $this->app = $app;
        $this->db = Module::LoadService('dbweb_cmsduz');
        $this->resMsg = $this->db->getResponseMessage(__CLASS__);
    }

    public function index() {
        $this->app->showView('index');
    }

    public function script() {
		header('Content-Type: application/javascript');
        $data['path_url'] = $this->app->adminUrl.'/'.$this->app->module.'/action';
        $this->app->subView($this->app->module.'/script', $data);
    }

    public function action($id) {
        $errMsg = array('title' => $this->app->activeUrl, 'text' => 'Invalid Url Or Missing Parameter ...', 'type' => 'danger');
        if(!$_POST){
            $this->app->showResponse(['status' => 'error', 'message' => $errMsg], 404);
            die;
        }

        switch ($id) {
            case 'validate':
                $resMsg = $this->resMsg[$id];
                $username = md5($_POST['username']);
                $password = md5($_POST['password']);
                $result = $this->db->getData('SELECT * FROM tref_user WHERE (user_name = ?) AND (user_pass = ?) LIMIT 1', array($username, $password));
                if($result['count'] == 1){
                    $this->app->setSession('USER_SESSION', $result['value'][0]);
                    $this->app->showResponse(['status' => 'success', 'message' => $resMsg[1]]);
                }else{
                    $this->app->showResponse(['status' => 'error', 'message' => $resMsg[0]], 404);
                }
                
                break;
            
            default:
                $this->app->showResponse(['status' => 'error', 'message' => $errMsg], 404);
                break;
        }
    }

}

?>