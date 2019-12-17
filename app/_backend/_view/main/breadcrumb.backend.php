<ol class="breadcrumb breadcrumb-bg-reds align-left">
<?php
    foreach ($this->navbar_backend as $key => $value):
        $link = $this->adminUrl.'/'.$value['link'];
        $link = rtrim($link, '/');
        if($link == $this->activeUrl){
            echo '<li><a href="">'.$this->admin_header.'</a></li>';
            echo '<li class="active"><a href="'.$link.'">'.$key.'</a></li>';
        }
        if(isset($value['submenu'])){
            foreach ($value['submenu'] as $s => $sub) {
                $link = $this->adminUrl.'/'.$sub['link'];
                if($link == $this->activeUrl){
                    echo '<li><a href="">'.$this->admin_header.'</a></li>';
                    echo '<li><a href="'.$link.'">'.$key.'</a></li>';
                    echo '<li class="active">'.$s.'</li>';
                }
            }
        }
    endforeach;
?>
</ol>