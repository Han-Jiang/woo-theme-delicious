
<?php get_header(); ?>


<?php
			global $woocommerce;
			// var_dump($woocommerce);

			?>

	<div data-role="content" id="order-layout">

		<div class="order-info">
			<div id="order_totalnum_layout">
				<p id="order_totalnum_text">已选 
				<span id="order_totalnum">
				<?php 
				global $woocommerce;
				echo $woocommerce->cart->get_cart_contents_count();
				?>
				</span></p>
			</div>
			
			<p id="order_totalprice_text">
			<span id="order_totalprice">
			<?php
			global $woocommerce;
			$amount2 = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
			// $amount2 = floatval( preg_replace( '#[^\d.]#', '', "£3,141.08" ) );

			echo $amount2;
			// var_dump($woocommerce->cart->total);
			// echo $woocommerce->cart->get_cart_total();
			?></span></p>	
			
			<div id="order_next_layout">
				<a id="order_next_text" rel="external" href="<?php echo $woocommerce->cart->get_cart_url(); ?> ?theme=0han_foodstile ">下一步 ＞</a>
			</div>	
		</div>

		<div class="order-content">
			<div id="typelist">
				<div id="wrapper_menu">
					<div id="scroller_menu">
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
				<div id="wrapper_content">
					<div id="scroller_content">
	
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
	    <div id="wrapper_popup" class="wrapper">
	    	<div id="foodinfo-content">
	    	</div>
	    </div>
	</div>

<?php get_footer(); ?>