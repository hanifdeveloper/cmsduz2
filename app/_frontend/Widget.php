<?php

class Widget {

    public function __construct($app) {
        $this->app = $app;
        $this->db = Module::LoadService('dbweb_cmsduz');
    }

    public function index() {
        // $this->app->debugResponse($_SERVER);
    }

    public function header() {
        $data['navbar'] = $this->db->getMenuNavbar();
        $this->app->subView(__CLASS__.'/header', $data);
    }

    public function footer() {
        $this->app->subView(__CLASS__.'/footer');
    }

    public function breakingNews() {
        $data['breakingNews'] = $this->db->getBreakingNews();
        $this->app->subView(__CLASS__.'/breaking-news', $data);
    }

    public function headlineNews() {
        $data['headlineNews'] = $this->db->getHeadlineNews();
        $this->app->subView(__CLASS__.'/headline-news', $data);
    }

    public function relatedNews($tags) {
        $data['relatedNews'] = $this->db->getRelatedNews($tags);
        $this->app->subView(__CLASS__.'/related-news', $data);
    }

    public function postPopular() {
        $data['popularNews'] = $this->db->getPopularNews();
        $this->app->subView(__CLASS__.'/post-popular', $data);
    }

    public function postTimeline() {
        // $data['breakingNews'] = $this->db->getBreakingNews();
        $this->app->subView(__CLASS__.'/post-timeline');
    }

    public function postMain() {
        $this->app->subView(__CLASS__.'/post-main');
    }

    public function postList() {
        $this->app->subView(__CLASS__.'/post-list');
    }

    public function postGridColumn() {
        $this->app->subView(__CLASS__.'/post-grid-column');
    }

    public function postGridRows() {
        $this->app->subView(__CLASS__.'/post-grid-rows');
    }

    public function banner468() {
        $this->app->subView(__CLASS__.'/banner-468');
    }

    public function banner300() {
        $this->app->subView(__CLASS__.'/banner-300');
    }

    public function banner125() {
        $this->app->subView(__CLASS__.'/banner-125');
    }

    public function formSearch() {
        $this->app->subView(__CLASS__.'/form-search');
    }

    public function tagList($tags) {
        $data['tags'] = $tags;
        $this->app->subView(__CLASS__.'/tag-list', $data);
    }

    public function about() {
        $this->app->subView(__CLASS__.'/about');
    }

    public function comments() {
        $this->app->subView(__CLASS__.'/comments');
    }

}

?>