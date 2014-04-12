
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

	<style>
		.model_1 .foodlabel {
			text-align: center;
			vertical-align: middle;
			width: 40px;
		}
		
		.model_1 .foodlabel div {
			width: 40px;
			height: 40px;	
		
			background-color: #ff4d4d;
			vertical-align: middle;
			
			-moz-border-radius: 20px 20px 20px 20px;
			border-radius: 20px 20px 20px 20px;
			
			display: table;
		}
		
		.model_1 .LabelText {
			color: #ffffff;
			font-size: 12px;
			font-weight: 600;
		
			padding: 0 6px 0 6px;
			margin: 0;
			
			vertical-align: middle;
			
			display: table-cell;
		}
	</style>
	<script type="text/javascript">
		var curTypeId = 0;
		var curFoodId = 0;
							curTypeId = 2193;
			
		var myScroll;
		var myScroll2;
		var myScroll3;

		function loaded() {
			myScroll = new IScroll("#wrapper", {
				click: true,
			});
			
			myScroll2 = new IScroll('#wrapper2', {
				eventPassthrough: false,
				preventDefault: false,
				useTransition: false,
			});
		}

		function loaded2() {
			myScroll3 = new IScroll("#wrapper3", {
				click: true,
			});
		}

		function scale(padding, border) {
		    var srcWidth = $( window ).width() - 50,
		        srcHeight = $( window ).height() - 100,
		        ifrPadding = 2 * padding,
		        ifrBorder = 2 * border,
		       	w, h;
		   
			    w = srcWidth;
			    h = srcHeight;

			    return {
			        'width': w - ( ifrPadding + ifrBorder ),
			        'height': h - ( ifrPadding + ifrBorder )
			    };
		}

		$('#shoporder-page').on("pageshow",function(){
			//弹窗相关
			$("#popupFoodinfo").on({
		        popupbeforeposition: function() {
		            var size = scale( 15, 1 ),
		                w = size.width;
		                h = size.height;

		            $("#wrapper3").css("width", w);
		            $("#wrapper3").css("height", h);
		        },
		        popupafteropen: function() {
		        	hideLoader();

		        	//初始化滚动条相关的东西
					setTimeout(function () { loaded2(); }, 200);
		        },
		        popupafterclose: function() {
		        	 $("#wrapper3").css("width", 0);
			         $("#wrapper3").css("height", 0);
		        },
		    });

			//初始化滚动条相关的东西
			setTimeout(function () { loaded(); }, 200);

			document.getElementById('shoporder-page').addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		})
		
		function showfoodinfo(food_name)
		{
			function OnFoodinfoSuccess(data, status)
			{
				document.getElementById('foodinfo-content').innerHTML = data;
				$('#popupFoodinfo').popup('open');

				myScroll3.refresh();
			}

			function OnFoodinfoFailed(data, status) 
			{
				hideLoader();
			}

			$.ajax({
		        type: "GET",
		        url: "<?php bloginfo('url')?>/?product="+food_name,
		        dataType : "html",  
		        cache : false,
		        success: OnFoodinfoSuccess,
		        error: OnFoodinfoFailed,
		    });

		    return true;
		}

		function closefoodinfo()
		{
			$('#popupFoodinfo').popup('close');
		}
		
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
				$('#keyword').focus();
			}else{
				$('#searchform').submit();
			}
		}
		function showfood(obj){
			var id = $(obj).attr('id');
			$('.active').removeClass('active');
			$(obj).addClass('active');
			$('.fooditem').hide();
			$('.'+id+'_food').show();

			myScroll2.scrollTo(0, 0, 200, 0);
			myScroll2.refresh();
		}
		function shouchang(obj,type){
			var tage = $(obj).attr('tage');
			if(tage != 'zc'){
				return false;
			}
			$(obj).attr('tage','jxz');
			var food_id = $(obj).attr('foodid');
			var url = "/index.php?r=show/foodcollect&customerid=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&adminId=295&shopId=712";
			$.post(url,{food_id:food_id,type:type},function(data){
				if(data == 'success'){
					$(obj).attr('tage','zc');
					$(obj).parent('div').siblings('div').show();
					$(obj).parent('div').hide();
				}else{
					$(obj).attr('tage','zc');
				}
			});
		}
	</script>
		

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
	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// 输出breadcrum
		// do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<!-- 页面标题 -->
			<!-- <h1 class="page-title"><?php woocommerce_page_title(); ?></h1> -->

		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>
			
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				//do_action( 'woocommerce_before_shop_loop' );
			?>
			

			<!-- this will load /loop/loop_start -->
			<?php //woocommerce_product_loop_start(); ?>
				 
				<?php woocommerce_product_subcategories(); ?> 

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php //woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */

		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// 侧边栏,包含搜索等默认widget
		//do_action( 'woocommerce_sidebar' );
	?>

							<div style="height: 10px;"></div>
						</div>
		
					</div>
				</div>
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

<?php get_footer( 'shop' ); ?>