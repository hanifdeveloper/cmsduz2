<?php

class Menu {

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
                $data = $this->db->getListMenu($_POST);
                $this->app->showResponse(['status' => 'success', 'data' => $data]);
                break;

            case 'form':
                $data = $this->db->getFormMenu($_POST['id']);
                $this->app->showResponse(['status' => 'success', 'data' => $data]);
                break;

            case 'update':
                $order = 1;
                function getParent($data, $parent, $order, $dbase){
                    foreach ($data as $key => $value) {
                        $dbase->update('tref_menu', array('menu_parent' => $parent, 'menu_order' => $order++), array('id_menu' => $value['id']));
                        if(isset($value['children'])){
                            getParent($value['children'], $value['id'], $order, $dbase);
                        }
                    }
                }

                getParent($_POST['struktur'], '', $order, $this->db);
                $this->app->showResponse(['status' => 'success', 'data' => $_POST]);
                break;

            case 'save':
                $data = $this->db->getFormMenu($_POST['id_menu']);
                $form = $this->db->paramsFilter($data['form'], $_POST);
                $form['menu_name'] = ucfirst(strtolower($form['menu_name']));
                if($form['menu_default'] == 'yes'){
                    $this->app->showResponse(['status' => 'error', 'message' => array('title' => 'Maaf', 'text' => 'Menu Default tidak bisa diubah/dihapus', 'type' => 'error')], 404);
                    die;
                }
                $resMsg = $this->resMsg['simpan'];
                $result = $this->db->save_update('tref_menu', $form);
                if($result['success'] == 0){
                    $resMsg[0]['text'] = $result['message'];
                    $this->app->showResponse(['status' => 'error', 'message' => $resMsg[0]], 404);
                }else{
                    $this->app->showResponse(['status' => 'success', 'message' => $resMsg[1]]);
                }
                
                break;

            case 'delete':
                $data = $this->db->getFormMenu($_POST['id']);
                $form = $this->db->paramsFilter($data['form'], $_POST);
                $form['menu_name'] = ucfirst(strtolower($form['menu_name']));
                if($form['menu_default'] == 'yes'){
                    $this->app->showResponse(['status' => 'error', 'message' => array('title' => 'Maaf', 'text' => 'Menu Default tidak bisa diubah/dihapus', 'type' => 'error')], 404);
                    die;
                }

                $resMsg = $this->resMsg['hapus'];
                $result = $this->db->delete('tref_menu', array('id_menu' => $_POST['id']));
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