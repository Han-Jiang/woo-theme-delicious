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
		</div>
	</div>



	
	<div data-role="popup" id="popupFoodinfo" data-overlay-theme="a" data-theme="d" data-tolerance="15, 15" class="ui-content">
		<button onclick="closefoodinfo()" data-theme="a" data-inline="true" data-mini="true" data-icon="delete" data-iconpos="notext" class="ui-btn-right">关闭</button>
	    <div id="wrapper3">
	    	<div id="foodinfo-content">
	    	</div>
	    </div>
	</div>


<?php get_footer();?>