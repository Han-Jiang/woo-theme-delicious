<?php 
//声明对woocommerce支持
add_theme_support( 'woocommerce' );
// remove woocommer default css
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/* register menu */
add_action( 'after_setup_theme', 'delicious_menu_setup' );
if ( ! function_exists( 'delicious_menu_setup' ) ):
    	function delicious_menu_setup() { 
    		register_nav_menu( 'primary', __( 'Primary Menu', 'wptuts' ) );
    	} 
endif;



function cs_wc_loop_add_to_cart_scripts() {
    if ( is_shop() || is_product_category() || is_product_tag() || is_product() ) : ?>
 
	<script>
	    jQuery(document).ready(function($) {
	        $(document).on( 'change', '.quantity .qty', function() {
	            $(this).parent('.quantity').next('.add_to_cart_button').attr('data-quantity', $(this).val());
	        });
	    });
	</script>
 
    <?php endif;
}
 
add_action( 'wp_footer', 'cs_wc_loop_add_to_cart_scripts' );

?>