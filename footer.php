    <div data-role="footer" data-position="fixed" data-id="shop_footer" data-tap-toggle="false">
      <div data-role="navbar">

          <ul>
              <li><a href="<?php bloginfo('url')?>" data-icon="home" >首页</a></li>
              <li><a href="<?php bloginfo('url')?>/shop" data-icon="search" >选购</a></li>
              <li><a href="<?php bloginfo('url')?>/cart" data-icon="grid" >下单</a></li>
              <li><a href="<?php bloginfo('url')?>/my-account" data-icon="info" >个人中心</a></li>
          </ul>
            <?php
            // wp_nav_menu( array(
            //     'menu'              => 'primary',
            //     'theme_location'    => 'primary',
            //     'depth'             => 1,
            //     'container'       => ''
            // ));
            ?>
      <!--
      <div class="menu ui-block-a">
        <ul class="ui-grid-d">
          <li class="page_item page-item-465 ui-block-a">
            <a href="http://localhost/wordpress/cart" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="span" data-theme="a" data-inline="true" class="ui-btn ui-btn-up-a ui-btn-inline">
            <span class="ui-btn-inner">
              <span class="ui-btn-text">Cart</span>
            </span>
            </a>
          </li>
          ...
        </ul>
      </div>
      -->
          <!-- 
          <ul>
              <li><a href="index.php?r=show/shopindex&customerid=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&adminId=295&shopId=712" data-icon="home" >首页</a></li>
              <li><a href="menu.php?r=show/shoporder&customerid=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&adminId=295&shopId=712" data-icon="search" >选购</a></li>
              <li><a href="pay.php?r=show/shopcart&customerid=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&adminId=295&shopId=712" data-icon="grid" class="ui-btn-active ui-state-persist">下单</a></li>
              <li><a href="index.php?r=show/usercenter&customerid=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&adminId=295&shopId=712" data-icon="info" >个人中心</a></li>
          </ul>
          -->
      </div>
    </div>

    <div data-role="popup" id="popupAttention" data-theme="e" class="ui-content">
        <div id="attention-content">
        </div>
    </div>

  </div> <!-- data-role="page" -->

  <?php wp_footer(); ?>

  </body>
</html>
