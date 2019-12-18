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
                    if($category['count'] > 0){
                        if(count($params) > 0){
                            $this->detail($params[0]);
                        }else{
                            $this->app->debugResponse($category['list']);
                        }
                    }else{
                        $this->app->module = 'main';
                        $this->app->showView('error', array('error_message' => 'Halaman tidak ditemukan ...'));
                    }
                }
				break;
		}
    }

    public function index() {
        $this->app->showView('index');
    }
    
    private function detail($berita) {
        $data = $this->db->getDetailNews($berita);
        // $this->app->debugResponse($data); die;
        $this->app->web_title = $data['news_title'];
        $this->app->showView('detail', $data);
    }

}

?>