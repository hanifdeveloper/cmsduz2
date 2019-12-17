<?php

class Widget {

    public function __construct($app) {
        $this->app = $app;
    }

    public function index() {
        $this->app->subView('widget/index');
        // $this->app->debugResponse($_SERVER);
        // $this->app->debugResponse($this->app->navbar_backend);
    }

}

?>