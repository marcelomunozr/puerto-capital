<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <title><?php wp_title( ' - ', true, 'right' ); ?>Puerto Capital</title>

    <!-- OGt -->
    <meta property="og:title" content="Puerto Capital">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">
    <meta property="og:image" content="http://www.puertocapital.cl/fb-puerto-capital/conectados.jpg">
    <meta property="og:description" content="Departamentos de 1, 2 y 3 dormitorios">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <!-- /OG -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/dist/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/dist/apple-touch-icon.png">


    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/styles/vendor.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/styles/main.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/styles/felipe.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css"><!-- font-family: 'Open Sans', sans-serif; -->
    

    <?php wp_head(); ?>
  </head>
  <body>

    <div class="cover_pestana">
        <div class="pestana">
            <a href="http://quest.tgapps.net/inmobiliaria/puerto-capital" target="_blank"><div class="boton-link"></div></a>
        </div>
    </div>
    <!--[if lt IE 10]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- <img src="http://placehold.it/961x1080"> -->
    <?php if(is_home()){ ?>
      <header>
        <div class="content-logo"><a href="#home" class="page-scroll"><div class="logo"></div></a></div>
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>    
          </div>
          <!-- HOME -->
          <div class="collapse navbar-collapse">
            <?php wp_nav_menu(array(
              'menu'=>'home-menu',
              'theme_location' => 'main',
              'menu_class' => 'nav navbar-nav',
              'container_class' => 'container',
              //'container_id' => 'bs-example-navbar-collapse-1'
            )); ?>
          </div>

        </nav>
      </header>
    <?php }else{ ?>
      <header>
        <div class="content-logo"><a href="/" class="page-scroll"><div class="logo"></div></a></div>
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>    
          </div>
          <!-- SINGLE -->
          <div class="collapse navbar-collapse">
            <?php wp_nav_menu(array(
              'menu'=>'single-menu',
              'theme_location' => 'main',
              'menu_class' => 'nav navbar-nav',
              'container_class' => 'container',
              //'container_id' => 'bs-example-navbar-collapse-1'
            )); ?>
          </div>

        </nav>
      </header>

    <?php }; ?>
    <a href="#home" class="page-scroll"><div class="up-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></div></a>