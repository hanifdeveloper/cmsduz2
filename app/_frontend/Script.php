<?php

class Script {

    public function __construct($app) {
        $this->app = $app;
        $this->index();
    }

    public function index() {
        header('Content-Type: application/javascript');
        // $data['path_url'] = $this->link_backend.'/'.__CLASS__;
        $this->app->subView(__CLASS__.'/script');
    }

}

?>