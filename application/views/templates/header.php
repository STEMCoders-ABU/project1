<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Stem Coders Club">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#252424">
    <meta name="apple-mobile-web-app-status-bar-style" content="#252424">
    
    <title>
      <?php if (isset($page_title)): ?>
        <?= $page_title . ' - Campus Space'; ?>
      <?php else: ?>
        <?= 'Campus Space'; ?>
      <?php endif; ?>
    </title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/favicon.ico') ?>" type="image/x-icon">

    <!-- Bootstrap core CSS, FontAwesome and custom css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles_sidebar.css') ?>">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<!-- The Header -->
    <header class="sticky-top">
      <!-- Navbar -->
     
      <nav class="navbar navbar-dark bg-dark text-white navbar-expand-sm px-3 shadow shadow-sm <?php if ($page_title == 'Home') echo 'nav-transparent'; else echo 'nav-opaque ignore-scroll-change'; ?>" 
        id="generic-navbar">
        <a class="navbar-brand" href="<?php echo site_url() ?>">
          <span class="fas fa-tools mr-2"></span><h4 class="d-inline align-bottom title-font logo-text">Campus</h4><h4 class="logo-text-2">Space</h4>
        </a>
        
        <button class="navbar-toggler text-light border border-light" style="outline:none" type="button" data-toggle="collapse"
          data-target="#nav-menu">
          <span class="fas fa-align-right"></span>
        </button>
                 
        <div id="nav-menu" class="collapse navbar-collapse justify-content-center">
          <ul class="navbar-nav text-white title-font">
            <li class="nav-item <?php if ($page_title == 'Home') echo 'active'; ?>"><a class="nav-link" href="<?php echo site_url() ?>">Home</a></li>
            <li class="nav-item <?php if ($page_title == 'Resources') echo 'active'; ?>"><a class="nav-link" href="<?php echo site_url('resources') ?>">Resources</a></li>
            <!--<li class="nav-item <?php if ($page_title == 'News') echo 'active'; ?>"><a class="nav-link" href="<?php echo site_url('news') ?>">News</a></li>-->
            <li class="nav-item <?php if ($page_title == 'Moderation') echo 'active'; ?>"><a class="nav-link" href="<?php echo site_url('moderation') ?>">Moderation</a></li>
            <li class="nav-item <?php if ($page_title == 'Contact') echo 'active'; ?>"><a class="nav-link" href="<?php echo site_url('contact') ?>">Contact</a></li>
            <li class="nav-item <?php if ($page_title == 'About') echo 'active'; ?>"><a class="nav-link" href="<?php echo site_url('#about') ?>">About</a></li>
          </ul>

          <div class="navbar-media-container">
            <span class="fab fa-facebook-f mr-1"></span>
            <span class="fab fa-whatsapp mr-1"></span>
            <span class="fab fa-twitter"></span>
          </div>

          <?php if ($this->session->has_userdata('logged') || $this->session->has_userdata('admin_logged')): ?>
            <a href="<?= site_url('moderation/logout'); ?>" class="btn btn-success btn-md-lg btn-logout">Sign Out</a>
          <?php endif; ?>
        </div>
      </nav>
    </header>
    
    <div id="page-contents">
      <!-- The Main Contents -->
      <main id="content-wrap" class="container-fluid px-0 pt-0 alegreya-r">
