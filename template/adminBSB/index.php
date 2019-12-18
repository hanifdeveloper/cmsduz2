<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $this->web_title; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?= $this->cssPath; ?>
    <style>
        .media-action {
            overflow: hidden;
            position: relative;
        }
        .media-action-content {
            position: absolute;
            right: -75px;
            top: 0;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s
        }
        .media-action:hover .media-action-content {
            right: 25px;
        }
        .media-thumbnail {
            position: relative;
            width: 100px;
            height: 100px;
            overflow: hidden;
        }
        .media-thumbnail img {
            position: absolute;
            left: 50%;
            top: 50%;
            height: 100%;
            width: auto;
            -webkit-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }
        img.image-crop {
            width: 100%;
            height: 150px!important;
            object-fit: cover;
        }
    </style>
</head>
<?php require_once $this->viewPath; ?>
</html>