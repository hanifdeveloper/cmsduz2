<!DOCTYPE html>
<html>
<head>
    <title><?= $this->web_title; ?></title>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- Stylesheet -->
    <?= $this->cssPath; ?>
    <!-- Responsive -->
    <link rel="stylesheet" media="(max-width:767px)" href="<?= $this->templatePath; ?>css/0-responsive.css">
    <link rel="stylesheet" media="(min-width:768px) and (max-width:1024px)" href="<?= $this->templatePath; ?>css/768-responsive.css">
    <link rel="stylesheet" media="(min-width:1025px) and (max-width:1199px)" href="<?= $this->templatePath; ?>css/1025-responsive.css">
    <link rel="stylesheet" media="(min-width:1200px)" href="<?= $this->templatePath; ?>css/1200-responsive.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Domine:400,700' rel='stylesheet' type='text/css'>
</head>
<?php require_once $this->viewPath; ?>
</html>
