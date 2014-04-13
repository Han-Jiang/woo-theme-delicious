

<?php 

// $categories = $product->get_categories("1","2","3");;
// var_dump($categories);
// $category_id = $categories[0]->cat_ID;

// $category_id = get_cat_ID('Category Name');



// global $wp_query;
// // get the query object
// $cat_obj = $wp_query->get_queried_object();
 
// pr($cat_obj);
 
// if($cat_obj)    {
//     $category_name = $cat_obj->name;
//     $category_desc = $cat_obj->description;
//     $category_ID  = $cat_obj->term_id;
// }


global $post;
$terms = get_the_terms( $post->ID, 'product_cat' );
// var_dump($terms);

if($terms){
	foreach ($terms as $term) {
    $product_cat_id = $term->term_id;
    break;
	}
}else{
	$product_cat_id = 0;
}


?>


<div class="fooditem foodtype_<?php echo $product_cat_id;?>_food" style="display:block;">
																	
	<div id="foodtitle_<?php echo get_the_ID(); ?>" class="foodtitle" onclick="foodtitleClick(<?php echo get_the_ID(); ?>)">
		<table width="100%">
			<td height="44px">
				<table width="100%">
					<td class="foodname"><?php the_title(); ?>
					
					</td>

					<td class="foodlabel">
						<div>
							<p class="LabelText">新品特价</p>
						</div>
					</td>
						
				</table>	
			</td>
			<td class="foodprice-nounit">£7</td>
				<td id="foodattention_<?php echo get_the_ID(); ?>" class="foodattention">
			</td>								
				
		</table>								
	</div>
	
	<div id="fooddetail_<?php echo get_the_ID(); ?>" class="fooddetail" style="display: none">
		<table>
			<td>
				<a href="#" onclick="showfoodinfo('<?php the_title(); ?>')" data-role="button" data-inline="true" data-mini="true">详情</a>
			</td>								 
			<td class="food-op">

				<?php woocommerce_template_single_add_to_cart();?>							
				<span class="reduce-btn"><a href="#" onclick="order_dec_onclick(<?php echo get_the_ID(); ?>, '/index.php?r=show/reducefood&food_id=<?php echo get_the_ID(); ?>&customer_id=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&admin_id=295&shop_id=712')" data-role="button" data-inline="true">-</a></span>
				
				<div id="order_foodnum_<?php echo get_the_ID(); ?>" class="foodnum">
					0									</div>
				<span class="add-btn"><a href="#" onclick="order_plus_onclick(<?php echo get_the_ID(); ?>, '/index.php?r=show/addfood&food_id=<?php echo get_the_ID(); ?>&customer_id=348801&wxusername=oiRPcjkEe0gxS8s5gUuoNW2RD5zg&admin_id=295&shop_id=712')" data-role="button" data-inline="true">+</a></span>
			</td>
		</table>							
	</div>
</div>	