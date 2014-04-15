

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
			<td class="foodprice-nounit">£ 
			<?php $price = get_post_meta( get_the_ID(), '_sale_price');
			if(!$price){
				$price = 0;
			}else{
				echo $price[0];
			}
			
			 ?>
			 </td>
				<td id="foodattention_<?php echo get_the_ID(); ?>" class="foodattention">
			</td>								
				
		</table>								
	</div>
	
	<div id="fooddetail_<?php echo get_the_ID(); ?>" class="fooddetail" style="display: none">
		<table>
			<td>
				<a id="add_to_cart" class="button-small" data-role="button" data-inline="true" href="#"
				onclick="food_add_to_cart(<?php echo get_the_ID(); ?>, <?php echo $price[0] ?>,'<?php bloginfo('url')?>/?post_type=product&add-to-cart=<?php echo get_the_ID(); ?>&quantity=')">Add to cart</a>
			</td>								 
			<td class="food-op">
				
				<span class="reduce-btn"><a href="#" 
					onclick="food_reduce(<?php echo get_the_ID(); ?>)"
					data-role="button" data-inline="true">-</a></span>
				
				<div id="order_foodnum_<?php echo get_the_ID(); ?>" class="foodnum">
					2									</div>
				
				<span class="add-btn"><a href="#"
				onclick="food_add(<?php echo get_the_ID(); ?>)"
				 data-role="button" data-inline="true">+</a></span>
		
				<?php //woocommerce_template_single_add_to_cart();?>
			</td>
		</table>							
	</div>
</div>	