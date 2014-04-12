
<?php get_header(); ?>

	<div data-role="content" id="order-layout">
		<div class="order-info">
			<div id="order_totalnum_layout">
				<p id="order_totalnum_text">已选 <span id="order_totalnum">33</span></p>
			</div>
			
			<p id="order_totalprice_text">£<span id="order_totalprice">267</span></p>	
			
			<div id="order_next_layout">
				<a id="order_next_text" href="/index.php?r=show/shopcart&customerid=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&adminId=295&shopId=712">下一步 ＞</a>
			</div>	
		</div>
		
		<div class="order-content">
			<div id="typelist">
				<div id="wrapper">
					<div id="scroller">
						<ul>

						<?php
						$args=array(
						  'taxonomy' => 'product_cat'   
						  );
						$categories=get_categories($args);
						  foreach($categories as $category) {?>
						  	<li id="foodtype_<?=$category->cat_ID ?>" class="" onclick="showfood(this)"><span><?= $category->name ?></span></li>
						<?php } ?>

						<?php foreach($categories as $category) {?>
						  	<li id="foodtype_<?=$category->cat_ID ?>" class="" onclick="showfood(this)"><span><?= $category->name ?></span></li>
						<?php } ?>
								
							<div style="height: 10px;"></div>					
						</ul>
					</div>
				</div>
			</div>  <!-- #typelist -->
			
			<div id="foodlist">
				<div id="wrapper2">
					<div id="scroller2">
	
						<div class="model_1">
	
								<?php if ( have_posts() ) : ?>

										<?php while ( have_posts() ) : the_post(); ?>

											<?php wc_get_template_part( 'content', 'product' ); ?>

										<?php endwhile; // end of the loop. ?>

								<?php endif; ?>

							<div style="height: 10px;"></div>
						</div><!-- #model_1 -->
		
					</div> <!-- #scroller2 -->
				</div> <!-- #wrapper2 -->
		    </div> <!-- #foodlist -->
		</div> <!-- #order-content -->
	</div> <!-- data-role="content" -->
	

	<!-- 菜式详情-->	
	<div data-role="popup" id="popupFoodinfo" data-overlay-theme="a" data-theme="d" data-tolerance="15, 15" class="ui-content">
		<button onclick="closefoodinfo()" data-theme="a" data-inline="true" data-mini="true" data-icon="delete" data-iconpos="notext" class="ui-btn-right">关闭</button>
	    <div id="wrapper3">
	    	<div id="foodinfo-content">
	    	</div>
	    </div>
	</div>

<?php get_footer(); ?>