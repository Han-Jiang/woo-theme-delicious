      <div data-role="footer" data-position="fixed" data-id="shop_footer" data-tap-toggle="false">
      <div data-role="navbar">

          <ul>
              <li><a href="<?php bloginfo('url')?>" data-icon="home" >首页</a></li>
              <li><a href="<?php bloginfo('url')?>/shop" data-icon="search" >选购</a></li>
              <li><a href="<?php bloginfo('url')?>/cart" data-icon="grid" >下单</a></li>
              <li><a href="<?php bloginfo('url')?>/my-account" data-icon="info" >个人中心</a></li>
          </ul>

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
