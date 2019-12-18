<?php

class dbweb_cmsduz extends Database {

    public function __construct() {
        $this->setConnection('dbweb_cmsduz');
        $this->link_file_image = $this->baseUrl.'/upload/image';
        $this->link_file_lampiran = $this->baseUrl.'/upload/lampiran';
    }

    /**
     * BACKEND MODEL
     */

    private function getLinkImage($path, $image, $no_image) {
        return (!empty($image) && file_exists($this->dir_upload_image.$path.$image)) ? $this->link_file_image.$path.$image : $this->link_file_image.'/'.$no_image;
    }

    private function getLinkLampiran($path, $lampiran, $no_lampiran) {
        return (!empty($lampiran) && file_exists($this->dir_upload_lampiran.$path.$lampiran)) ? $this->link_file_lampiran.$path.$lampiran : $this->link_file_lampiran.'/'.$no_lampiran;
    }

    private function getCustomList($dataArray, $modul = '') {
        $result = [];
        foreach ($dataArray['value'] as $key => $value) {
            $result[$key] = $value;
            switch ($modul) {

                case 'menu':
                    $result[$key]['menu_link'] = $this->baseUrl.'/'.$value['menu_link'];
                    break;

                case 'kategori':
                    $result[$key]['category_link'] = $this->baseUrl.'/kategori/'.$value['category_slug'].'.html';
                    break;

                case 'berita':
                    $result[$key]['short_content'] = substr(strip_tags($value['news_content']), 0, 300).'...';
                    $result[$key]['news_link'] = $this->baseUrl.'/berita/'.$value['category_slug'].'/'.$value['news_slug'].'.html';
                    $result[$key]['news_image'] = $this->getLinkImage('/berita/', $value['news_image'], 'no-image.png');
                    $result[$key]['news_tag'] = explode(',', $value['news_tag']);
                    $result[$key]['news_publish'] = ucfirst($value['news_publish']);
                    $result[$key]['news_date'] = FUNC::tanggal($value['news_date'], 'long_date');
                    $result[$key]['moments'] = FUNC::moments($value['datetime']);
                    $result[$key]['headline'] = ($value['headline'] == 'yes') ? 'Headline News' : '';
                    break;

                case 'album':
                    $result[$key]['album_link'] = $this->baseUrl.'/album/'.$value['album_slug'].'.html';
                    $result[$key]['album_image'] = $this->getLinkImage('/album/', $value['album_image'], 'no-image.png');
                    break;

                case 'galeri':
                    $result[$key]['gallery_image'] = $this->getLinkImage('/galeri/', $value['gallery_image'], 'no-image.png');
                    break;
                
                default:
                    # code...
                    break;
            }
            
        }

        return $result;
    }

    public function getMenuNavbar() {
        $data = $this->getData('SELECT * FROM tref_menu ORDER BY menu_order');
        function checkParent($menu, $id){
            foreach ($menu as $key => $value) {
                if($value['menu_parent'] == $id) return true;
            }
            return false;
        }
        
        function createNavbar($menu, $parent = ''){
            $result = [];
            $index = 0;
            foreach ($menu as $key => $value) {
                if($value['menu_parent'] == $parent){
                    $result[$index] = array(
                        'id' => $value['id_menu'],
                        'text' => $value['menu_name'],
                        'link' => $value['menu_link'],
                    );
                    if(checkParent($menu, $value['id_menu'])){
                        $result[$index]['submenu'] = createNavbar($menu, $value['id_menu']);
                    }
                    $index++;
                }
            }
            return $result;
        }

        $result = $this->getCustomList($data, 'menu');
        return createNavbar($result);
    }

    public function getChoicePublish() {
        return array(
            'publish' => array('text' => 'YA'),
            'unpublish' => array('text' => 'TIDAK'),
        );
    }

    public function getChoiceHeadlineNews() {
        return array(
            'yes' => array('text' => 'YA'),
            'no' => array('text' => 'TIDAK'),
        );
    }

    public function getChoiceDisabled() {
        return array(
            'yes' => array('text' => 'YA'),
            'no' => array('text' => 'TIDAK'),
        );
    }
    
    public function getChoiceCategoryNews() {
        $data = $this->getData('SELECT * FROM tref_category ORDER BY id_category');
        $result = [];
        if($data['count'] > 0){
            foreach ($data['value'] as $key => $value) {
                $result[$value['id_category']] = ['text' => $value['category_name']];
            }
        }

        return $result;
    }

    public function getChoiceAlbumGallery() {
        $data = $this->getData('SELECT * FROM tref_album ORDER BY id_album');
        $result = [];
        if($data['count'] > 0){
            foreach ($data['value'] as $key => $value) {
                $result[$value['id_album']] = ['text' => $value['album_name']];
            }
        }

        return $result;
    }

    public function getFormMenu($id = '') {
        $result['form'] = $this->getDataTabel('tref_menu', ['id_menu', $id]);
        $result['title'] = empty($id) ? 'Tambah Menu' : 'Edit Menu';
        $result['form']['menu_order'] = ($result['form']['menu_order'] == 0) ? $this->getOrderNumber('tref_menu') : $result['form']['menu_order'];
        $result['disable_choice'] = $this->getChoiceDisabled();
        return $result;
    }

    public function getFormCategory($id = '') {
        $result['form'] = $this->getDataTabel('tref_category', ['id_category', $id]);
        $result['title'] = empty($id) ? 'Tambah Kategori' : 'Edit Kategori';
        return $result;
    }

    public function getFormNews($id = '') {
        $result['form'] = $this->getDataTabel('tref_news', ['id_news', $id]);
        $result['title'] = empty($id) ? 'Tambah Berita' : 'Edit Berita';
        $result['category_choice'] = array('' => array('text' => 'PILIH ')) + $this->getChoiceCategoryNews();
        $result['publish_choice'] = array('' => array('text' => 'PILIH ')) + $this->getChoicePublish();
        $result['headline_choice'] = array('' => array('text' => 'PILIH ')) + $this->getChoiceHeadlineNews();
        $result['mimes_image'] = $this->files->getMimeTypes($this->file_type_image);
        $result['link_news_image'] = $this->getLinkImage('/berita/', $result['form']['news_image'], 'no-image.png');
		$result['desc_image_upload'] = '*) File Type : '.$this->file_type_image.', Max Size : '.($this->max_size / 1024 /1024).'Mb';
        return $result;
    }

    public function getFormAlbum($id = '') {
        $result['form'] = $this->getDataTabel('tref_album', ['id_album', $id]);
        $result['title'] = empty($id) ? 'Tambah Album' : 'Edit Album';
        $result['publish_choice'] = array('' => array('text' => 'PILIH ')) + $this->getChoicePublish();
        $result['mimes_image'] = $this->files->getMimeTypes($this->file_type_image);
        $result['link_album_image'] = $this->getLinkImage('/album/', $result['form']['album_image'], 'no-image.png');
		$result['desc_image_upload'] = '*) File Type : '.$this->file_type_image.', Max Size : '.($this->max_size / 1024 /1024).'Mb';
        return $result;
    }

    public function getFormGallery($id = '') {
        $result['form'] = $this->getDataTabel('tref_gallery', ['id_gallery', $id]);
        $result['title'] = empty($id) ? 'Tambah Galeri' : 'Edit Galeri';
        $result['album_choice'] = array('' => array('text' => 'PILIH ')) + $this->getChoiceAlbumGallery();
        $result['mimes_image'] = $this->files->getMimeTypes($this->file_type_image);
        $result['link_gallery_image'] = $this->getLinkImage('/galeri/', $result['form']['gallery_image'], 'no-image.png');
		$result['desc_image_upload'] = '*) File Type : '.$this->file_type_image.', Max Size : '.($this->max_size / 1024 /1024).'Mb';
        return $result;
    }

    public function getListMenu($input) {
        $params = $this->paramsFilter(['page' => 1, 'cari' => '', 'limit' => 5], $input);
        $page = $params['page'];
        $cari = '%'.$params['cari'].'%';
        $q_from = 'tref_menu WHERE (menu_name LIKE ?)';
        $q_count = 'SELECT COUNT(*) AS jumlah FROM '.$q_from;
        $q_value = 'SELECT * FROM '.$q_from.' ORDER BY id_menu DESC';
        $idKey = [$cari];
        $limit = $params['limit'];
        $position = ($page - 1) * $limit;
        $dataCount = $this->getData($q_count, $idKey, self::SINGLE_DATA);
        $dataArray = $this->getData($q_value.' LIMIT '.$position.','.$limit, $idKey);
        $result['number'] = $position + 1;
        $result['page'] = $page;
        $result['limit'] = $limit;
        $result['count'] = $dataCount['value']['jumlah'];
        $result['list'] = $this->getCustomList($dataArray, 'menu');
        $result['menu'] = $this->getMenuNavbar();
        $result['title'] = 'Daftar Menu';
        $result['label'] = 'Jumlah Data : '.FUNC::ribuan($result['count']).' menu';
        $result['query'] = $dataArray['query'];
        $result['query'] = '';
        return $result;
    }

    public function getListCategory($input) {
        $params = $this->paramsFilter(['page' => 1, 'cari' => '', 'slug' => '', 'limit' => 5], $input);
        $page = $params['page'];
        $cari = '%'.$params['cari'].'%';
        $slug = '%'.$params['slug'].'%';
        $q_from = 'tref_category WHERE (category_name LIKE ?) AND (category_slug LIKE ?)';
        $q_count = 'SELECT COUNT(*) AS jumlah FROM '.$q_from;
        $q_value = 'SELECT * FROM '.$q_from.' ORDER BY id_category DESC';
        $idKey = [$cari, $slug];
        $limit = $params['limit'];
        $position = ($page - 1) * $limit;
        $dataCount = $this->getData($q_count, $idKey, self::SINGLE_DATA);
        $dataArray = $this->getData($q_value.' LIMIT '.$position.','.$limit, $idKey);
        $result['number'] = $position + 1;
        $result['page'] = $page;
        $result['limit'] = $limit;
        $result['count'] = $dataCount['value']['jumlah'];
        $result['list'] = $this->getCustomList($dataArray, 'kategori');
        $result['title'] = 'Daftar Kategori';
        $result['label'] = 'Jumlah Data : '.FUNC::ribuan($result['count']).' kategori';
        $result['query'] = $dataArray['query'];
        $result['query'] = '';
        return $result;
    }

    public function getListNews($input) {
        $params = $this->paramsFilter(['page' => 1, 'cari' => '', 'slug' => '', 'publish' => '', 'kategori' => '', 'tag' => '', 'limit' => 5, 'order' => 'id_news'], $input);
        $page = $params['page'];
        $cari = '%'.$params['cari'].'%';
        $slug = '%'.$params['slug'].'%';
        $publish = !empty($params['publish']) ? ' AND (news.news_publish = "'.$params['publish'].'")' : '';
        $kategori = !empty($params['kategori']) ? ' AND (news.category_id = "'.$params['kategori'].'")' : '';
        $tag = $params['tag'];
        if(!empty($tag)){
            $tag = explode(',', $tag);
            foreach ($tag as $key => $value) { $result[] = '(news_tag LIKE "%'.$value.'%")';}
            $tag = ' AND ('.implode(' OR ', $result).')';
        }

        $q_from = 'tref_news news JOIN tref_category category ON (news.category_id=category.id_category) WHERE (news.news_title LIKE ?) AND (news.news_slug LIKE ?)';
        $q_count = 'SELECT COUNT(*) AS jumlah FROM '.$q_from.$publish.$kategori.$tag;
        $q_value = 'SELECT * FROM '.$q_from.$publish.$kategori.$tag.' ORDER BY '.$params['order'].' DESC';
        $idKey = [$cari, $slug];
        $limit = $params['limit'];
        $position = ($page - 1) * $limit;
        $dataCount = $this->getData($q_count, $idKey, self::SINGLE_DATA);
        $dataArray = $this->getData($q_value.' LIMIT '.$position.','.$limit, $idKey);
        $result['number'] = $position + 1;
        $result['page'] = $page;
        $result['limit'] = $limit;
        $result['count'] = $dataCount['value']['jumlah'];
        $result['list'] = $this->getCustomList($dataArray, 'berita');
        $result['title'] = 'Daftar Berita';
        $result['label'] = 'Jumlah Data : '.FUNC::ribuan($result['count']).' berita';
        $result['query'] = $dataArray['query'];
        $result['query'] = '';
        return $result;
    }

    public function getListAlbum($input) {
        $params = $this->paramsFilter(['page' => 1, 'cari' => '', 'slug' => '', 'publish' => '', 'limit' => 3], $input);
        $page = $params['page'];
        $cari = '%'.$params['cari'].'%';
        $slug = '%'.$params['slug'].'%';
        $publish = !empty($params['publish']) ? ' AND (album_publish = "'.$params['publish'].'")' : '';
        $q_from = 'tref_album WHERE (album_name LIKE ?) AND (album_slug LIKE ?)';
        $q_count = 'SELECT COUNT(*) AS jumlah FROM '.$q_from.$publish;
        $q_value = 'SELECT * FROM '.$q_from.$publish.' ORDER BY id_album DESC';
        $idKey = [$cari, $slug];
        $limit = $params['limit'];
        $position = ($page - 1) * $limit;
        $dataCount = $this->getData($q_count, $idKey, self::SINGLE_DATA);
        $dataArray = $this->getData($q_value.' LIMIT '.$position.','.$limit, $idKey);
        $result['number'] = $position + 1;
        $result['page'] = $page;
        $result['limit'] = $limit;
        $result['count'] = $dataCount['value']['jumlah'];
        $result['list'] = $this->getCustomList($dataArray, 'album');
        $result['title'] = 'Daftar Album';
        $result['label'] = 'Jumlah Data : '.FUNC::ribuan($result['count']).' album';
        $result['query'] = $dataArray['query'];
        $result['query'] = '';
        return $result;
    }

    public function getListGallery($input) {
        $params = $this->paramsFilter(['page' => 1, 'cari' => '', 'album' => '', 'limit' => 16], $input);
        $page = $params['page'];
        $cari = '%'.$params['cari'].'%';
        $album = !empty($params['album']) ? ' AND (gallery.album_id = "'.$params['album'].'")' : '';
        $q_from = 'tref_gallery gallery JOIN tref_album album ON (gallery.album_id=album.id_album) WHERE (gallery.gallery_name LIKE ?)';
        $q_count = 'SELECT COUNT(*) AS jumlah FROM '.$q_from.$album;
        $q_value = 'SELECT * FROM '.$q_from.$album.' ORDER BY id_gallery DESC';
        $idKey = [$cari];
        $limit = $params['limit'];
        $position = ($page - 1) * $limit;
        $dataCount = $this->getData($q_count, $idKey, self::SINGLE_DATA);
        $dataArray = $this->getData($q_value.' LIMIT '.$position.','.$limit, $idKey);
        $result['number'] = $position + 1;
        $result['page'] = $page;
        $result['limit'] = $limit;
        $result['count'] = $dataCount['value']['jumlah'];
        $result['list'] = $this->getCustomList($dataArray, 'galeri');
        $result['title'] = 'Daftar Galeri';
        $result['label'] = 'Jumlah Data : '.FUNC::ribuan($result['count']).' gambar';
        $result['query'] = $dataArray['query'];
        $result['query'] = '';
        return $result;
    }

    /**
     * FRONTEND MODEL
     */

    public function getBreakingNews() {
        $result = $this->getListBerita(array('publish' => 'publish','limit' => 5, 'order' => 'tanggal_berita'));
        return $result['list'];
    }

    public function getPopularNews() {
        $result = $this->getListBerita(array('publish' => 'publish', 'limit' => 5, 'order' => 'dibaca_berita'));
        return $result['list'];
    }

    public function getRelatedNews($tag) {
        $result = $this->getListBerita(array('publish' => 'publish', 'tag' => implode(',', $tag), 'limit' => 5));
        return $result['list'];
    }

    public function getDetailNews($slug) {
        $cari = explode('.', $slug);
        $result = $this->getListBerita(array('slug' => $cari[0], 'publish' => 'publish', 'limit' => 1));
        $result = $result['list'][0];
        $dibaca = $result['dibaca_berita'];
        // Update dibaca
        $this->update('tb_berita', array('dibaca_berita' => ($dibaca + 1)), array('id_berita' => $result['id_berita']));
        return $result;
    }

    public function getNewsByKategori($kategori) {
        $result = $this->getListBerita(array('publish' => 'publish', 'kategori' => $kategori, 'limit' => 5));
        return $result['list'];
    }
}

?>