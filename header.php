<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- 描述手机设备,不允许放大 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no">
    
    <!-- 网页元信息 -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="暨林瀚">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri().'/img/favicon.ico' ?>">

    <!-- 站点名称 -->
    <title> <?php bloginfo('name'); ?></title>

    <!-- 载入Wordpres核心CSS -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
   
    <!-- IE兼容处理 -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <!--以下载入主题需要的JS和CSS
  *************************************************-->
  <!-- 载入JQuery Mobile 样式 -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
  <!-- 载入JQuery -->
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
   <!-- 载入Jquery Mobile -->
  <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>

  <!-- iscroll插件 -->
  <script src="<?php bloginfo('template_url'); ?>/js/iscroll-lite.js"></script>
  
  <!-- 载入自定义的js和css -->
  <script src="<?php bloginfo('template_url'); ?>/js/shoporder.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/shop.css" />
	
  <!-- 插入导航JS -->
  <script>
      $(document).bind("mobileinit", function() {
        //初始化代码
        $.mobile.loadingMessage = "正在加载";
        $.mobile.pageLoadErrorMessage = "加载页面出错";

        $.mobile.page.prototype.options.backBtnText = "后退";
        $.mobile.dialog.prototype.options.closeBtnText = "关闭";

        $.mobile.page.prototype.options.domCache = false;

        if (navigator.userAgent.indexOf("Android") != -1)
        {
          $.mobile.defaultPageTransition = 'none'; 
          $.mobile.defaultDialogTransition = 'none'; 
        }
        else
        {
          $.mobile.defaultPageTransition = 'slide'; 
          $.mobile.defaultDialogTransition = 'pop';
        }

      });
    </script>

  <?php wp_head(); ?>   
  </head>
<body>

<div data-role="page" id = "shoporder-page">  
  <?php require_once('header-jqm.php') ?>
