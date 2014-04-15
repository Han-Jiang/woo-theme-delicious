<?php 
//声明对woocommerce支持
add_theme_support( 'woocommerce' );
// remove woocommer default css
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/* register menu */
add_action( 'after_setup_theme', 'delicious_menu_setup' );
if ( ! function_exists( 'delicious_menu_setup' ) ):
    	function delicious_menu_setup() { 
    		register_nav_menu( 'primary', __( 'Primary Menu', 'wptuts' ) );
    	} 
endif;



// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
 
// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


function override_page_title() {
	return false;
}
add_filter('woocommerce_show_page_title', 'override_page_title');
?>