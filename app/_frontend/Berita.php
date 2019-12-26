<?php

class Berita {

    public function __construct($app) {
        $this->app = $app;
        $this->db = Module::LoadService('dbweb_cmsduz');
        $method = $this->app->method;
        $params = $this->app->params;
		switch ($method) {
            /**
             * Rule:
             * berita.html -> index
             * berita/kategori.html -> list berita berdasarkan kategori
             * berita/kategori/detail.html -> tampil detail berita
             */
			case '':
                $this->index();
				break;
			
			default:
				if((int)method_exists($this, $method) > 0){
                    $this->$method($params);
                }else{
                    // Check Kategori Berita
                    $category = $this->db->getNewsByKategori($method);
                    // $this->app->debugResponse($category); die;
                    if($category['count'] > 0){
                        if(count($params) > 0){
                            $this->detail($params[0]);
                        }else{
                            $this->app->debugResponse($category['list']);
                        }
                    }else{
                        $this->errorPage();
                    }
                }
				break;
		}
    }

    public function index() {
        $this->app->showView('index');
    }

    public function comment() {
        if(!$_POST){
            echo '<meta http-equiv="refresh" content="0;URL=\''.$this->app->baseUrl.'\'" />';
            die;
        }

        $data = $this->db->getFormComment();
        $form = $this->db->paramsFilter($data['form'], $_POST);
        $result = $this->db->save_update('tref_comment', $form);
        if($result['success'] == 0){
            // echo $result['message'];
            $this->app->setSession('RESPONSE_MESSAGE', '<div class="alert alert_red"><i class="fa fa-exclamation-triangle"></i><p>Oops! Your comment failed to post</p></div>');
        }else{
            $this->app->setSession('RESPONSE_MESSAGE', '<div class="alert alert_green"><i class="fa fa-thumbs-up"></i><p>Your comment has been sent</p></div>');
        }
        echo '<meta http-equiv="refresh" content="0;URL=\''.$_POST['news_url'].'\'" />';
    }
    
    private function detail($berita) {
        $data = $this->db->getDetailNews($berita);
        if(empty($data)) $this->errorPage();
        // $this->app->debugResponse($data); die;
        $this->app->web_title = strtoupper($data['news_title']);
        $this->app->showView('detail', $data);
    }

    private function errorPage() {
        $this->app->module = 'main';
        $this->app->showView('error', array('error_message' => 'Halaman tidak ditemukan ...'));
        die;
    }

}

?>