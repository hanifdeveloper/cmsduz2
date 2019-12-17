<?php

class Galeri {

    public function __construct($app) {
        $this->app = $app;
        $this->db = Module::LoadService('dbweb_cmsduz');
        $this->resMsg = $this->db->getResponseMessage(__CLASS__);
    }

    public function index() {
        $data['album_choice'] = array('' => array('text' => 'SEMUA')) + $this->db->getChoiceAlbumGallery();
        $this->app->showView('index', $data);
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
                $data = $this->db->getListGallery($_POST);
                $this->app->showResponse(['status' => 'success', 'data' => $data]);
                break;

            case 'form':
                $data = $this->db->getFormGallery($_POST['id']);
                $this->app->showResponse(['status' => 'success', 'data' => $data]);
                break;

            case 'save':
                $upload = $this->app->uploadImage($_FILES['image'], 'galeri', 'resize');
                if($upload['status'] == 'success'){
                    $data = $this->db->getFormGallery($_POST['id_gallery']);
                    $form = $this->db->paramsFilter($data['form'], $_POST);
                    $form['gallery_image'] = empty($upload['UploadFile']) ? $form['gallery_image'] : $upload['UploadFile'];
                    $resMsg = $this->resMsg['simpan'];
                    $result = $this->db->save_update('tref_gallery', $form);
                    if($result['success'] == 0){
                        $resMsg[0]['text'] = $result['message'];
                        $this->app->showResponse(['status' => 'error', 'message' => $resMsg[0]], 404);
                    }else{
                        $this->app->showResponse(['status' => 'success', 'message' => $resMsg[1]]);
                    }
                }else{
                    $resMsg = $this->resMsg['upload'];
                    $resMsg[0]['text'] = $upload['errorMsg'];
                    $this->app->showResponse(['status' => 'error', 'message' => $resMsg[0]], 404);
                }
                
                break;

            case 'delete':
                $resMsg = $this->resMsg['hapus'];
                $result = $this->db->delete('tref_gallery', array('id_gallery' => $_POST['id']));
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