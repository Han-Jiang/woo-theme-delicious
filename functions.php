<?php 
//声明对woocommerce支持
add_theme_support( 'woocommerce' );

/* register menu */
add_action( 'after_setup_theme', 'delicious_menu_setup' );
if ( ! function_exists( 'delicious_menu_setup' ) ):
    	function delicious_menu_setup() { 
    		register_nav_menu( 'primary', __( 'Primary Menu', 'wptuts' ) );
    	} 
endif;


// function wpt_register_js() {
    // wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    // wp_enqueue_script('jquery.bootstrap.min');
// }
// add_action( 'init', 'wpt_register_js' );
// function wpt_register_css() {
    // wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    // wp_enqueue_style( 'bootstrap.min' );
// }
// add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

?>