<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability = $product->get_availability();

	if ( $availability['availability'] )
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
	 		// if ( ! $product->is_sold_individually() )
	 		// 	woocommerce_quantity_input( array(
	 		// 		'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 		// 		'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 		// 	) );
	 	?> 


		<span class="reduce-btn"><a href="#" 
			onclick="order_dec_onclick(<?php echo get_the_ID(); ?>, 
			 	'<?php bloginfo('url')?>/?post_type=product&add-to-cart=<?php echo get_the_ID(); ?>&quantity=')"
			 	 data-role="button" data-inline="true">-</a></span>
		
		
		<<input name="quantity" value="1" id="order_foodnum_<?php echo get_the_ID(); ?>" class="foodnum">
			2									</<input>
		<span class="add-btn"><a href="#"
		onclick="order_plus_onclick(<?php echo get_the_ID(); ?>, 
		'<?php bloginfo('url')?>/?post_type=product&add-to-cart=<?php echo get_the_ID(); ?>&quantity=')"
		 data-role="button" data-inline="true">+</a></span>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	 	<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>