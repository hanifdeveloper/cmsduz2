<?php

class Halaman {

    public function __construct($app) {
        $this->app = $app;
        $this->db = Module::LoadService('dbweb_cmsduz');
        $method = $this->app->method;
        $params = $this->app->params;
		switch ($method) {
            /**
             * Rule:
             * halaman.html -> error page
             * halaman/detail.html -> tampil detail artikel
             */
			case '':
                $this->errorPage();
				break;
			
			default:
				if((int)method_exists($this, $method) > 0){
                    $this->errorPage();
                }else{
                    $this->detail($method);
                }
				break;
		}
    }

    public function index() {
        $this->errorPage();
    }
    
    private function detail($article) {
        $data = $this->db->getDetailArticle($article);
        if(empty($data)) $this->errorPage();
        // $this->app->debugResponse($data); die;
        $this->app->web_title = $data['article_title'];
        $this->app->showView('detail', $data);
    }

    private function errorPage() {
        $this->app->module = 'main';
        $this->app->showView('error', array('error_message' => 'Halaman tidak ditemukan ...'));
        die;
    }

}

?>