<?php

class Main {

    public function __construct($app) {
        $this->app = $app;
        $this->db = Module::LoadService('dbweb_cmsduz');
        $method = $this->app->method;
        $params = $this->app->params;
		switch ($method) {
			case '':
                $this->index();
				break;
			
			default:
				if((int)method_exists($this, $method) > 0){
                    $this->$method($params);
                }else{
                    // $this->app->showView('error', array('error_message' => 'Module Not Founds'));
                    echo $method;
                }
				break;
		}
    }

    public function index() {
        $this->app->showView('index');
        // $data['breakingNews'] = $this->db->getBreakingNews();
        // $data['popularNews'] = $this->db->getPopularNews();
        // $data['relatedNews'] = $this->db->getRelatedNews(array('politik'));
        // $data['detailNews'] = $this->db->getDetailNews('european-scientists-face-decisions-as-comet-probe-batteries-run-down');
        // $this->app->debugResponse($data);
    }

}

?>