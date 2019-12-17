<?php

class Main {

    public function __construct($app) {
        $this->app = $app;
    }

    public function index() {
        $this->app->showView('index');
        // $this->app->debugResponse($_SERVER);
        // $this->app->debugResponse($this->app->navbar_backend);
    }

    public function widget(){
        $this->app->debugResponse($_SERVER);
    }

    public function script() {
		header('Content-Type: application/javascript');
        // $data['path_url'] = $this->link_backend.'/'.__CLASS__;
        $this->app->subView(__CLASS__.'/script');
	}

}

?>