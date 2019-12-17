<?php

class Kategori {

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
        $errMsg = array('title' => $this->app->activeUrl, 'text' => 'Invalid Url Or Missing Parameter ...', 'type' => 'error');
        if(!$_POST){
            $this->app->showResponse(['status' => 'error', 'message' => $errMsg], 404);
            die;
        }

        switch ($id) {
            case 'list':
                $data = $this->db->getListCategory($_POST);
                $this->app->showResponse(['status' => 'success', 'data' => $data]);
                break;

            case 'form':
                $data = $this->db->getFormCategory($_POST['id']);
                $this->app->showResponse(['status' => 'success', 'data' => $data]);
                break;

            case 'save':
                $data = $this->db->getFormCategory($_POST['id_category']);
                $form = $this->db->paramsFilter($data['form'], $_POST);
                $form['category_name'] = strtoupper($form['category_name']);
                $form['category_slug'] = FUNC::slug($form['category_name']);
                $resMsg = $this->resMsg['simpan'];
                $result = $this->db->save_update('tref_category', $form);
                if($result['success'] == 0){
                    $resMsg[0]['text'] = $result['message'];
                    $this->app->showResponse(['status' => 'error', 'message' => $resMsg[0]], 404);
                }else{
                    $this->app->showResponse(['status' => 'success', 'message' => $resMsg[1]]);
                }
                
                break;

            case 'delete':
                $resMsg = $this->resMsg['hapus'];
                $result = $this->db->delete('tref_category', array('id_category' => $_POST['id']));
                if($result['success'] == 0){
                    $resMsg[0]['text'] = $result['message'];
                    $this->app->showResponse(['status' => 'error', 'message' => $resMsg[0]], 404);
                }else{
                    $this->app->showResponse(['status' => 'success', 'message' => $resMsg[1]]);
                }
                break;
            
            default:
                $this->app->showResponse(['status' => 'error', 'message' => $errMsg], 404);
                break;
        }
    }

}

?>