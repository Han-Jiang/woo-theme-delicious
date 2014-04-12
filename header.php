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
  <script src="<?php bloginfo('template_url'); ?>/js/iscroll/iscroll-lite.js"></script>
  
  <!-- 载入自定义的js和css -->
  <script src="<?php bloginfo('template_url'); ?>/js/shoporder.js?version=1.0.3.1"></script>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/shop.css?version=1.0.3.7" />
	
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
    <script> 
     $(document).ready(function() { 
      // disable ajax nav 
      $.mobile.ajaxLinksEnabled = false; 
     }); 
    </script> 

  <?php wp_head(); ?>   
  </head>
<body>

<div data-role="page" id = "shoporder-page"> 


  <script type="text/javascript">
    var height = 0;
    function cbutton(obj){
      if(height == 0){
        height = $('#pagetop').css('height');
        $('#box').css('top',height);  
      }
      $('#box').toggle();
    }

    function submitsearch(){
      var keyword = $('#keyword').val();
      if(keyword == ''){
        $('#s').focus();
      }else{
        $('#searchform').submit();
      }
    }
  </script>
  
    
  <div id="pagetop" data-role="header" data-position="fixed" data-tap-toggle="false" data-id="shop_header">
    <h1 id = "page_title">伯明翰汉朝餐厅</h1>
    <a data-icon="search" class="ui-btn-right" onclick="cbutton(this);">搜索</a>
  </div>

  <div id="box" style="width:100%;background:#ffffff;position:fixed;top:0px;left:0px;display:none;padding-buttom:20px;z-index:9999;">
    <form id="searchform" action="<?php bloginfo('url')?>/" method="post">
      <div style="width:95%;margin:0 auto;position:relative;">
        <input type="text" name="s" placeholder="搜索商品" id="s"/>
        <span onclick="return submitsearch();" style="position:absolute;background:transparent;border:0;width:50px;top:9px;right:3px;z-index:9999;">搜索</span>
      </div>
    </form>
  </div>

