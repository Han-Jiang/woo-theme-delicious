      <div data-role="footer" data-position="fixed" data-id="shop_footer" data-tap-toggle="false">
      <div data-role="navbar">

          <ul>
              <li><a href="<?php bloginfo('url')?>?theme=0han_foodstile" data-icon="home" rel="external">首页</a></li>
              <li><a href="<?php bloginfo('url')?>/shop?theme=0han_delicious" data-icon="search" rel="external">选购</a></li>
              <li><a href="<?php bloginfo('url')?>/cart?theme=0han_foodstile" data-icon="grid" rel="external">下单</a></li>
              <li><a href="<?php bloginfo('url')?>/my-account?theme=0han_foodstile" data-icon="info" rel="external">个人中心</a></li>
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
