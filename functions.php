<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

// add google custom font
add_action( 'storefront_header', 'jk_storefront_header_content', 40 );
    function jk_storefront_header_content() { ?>
		<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
	<?php }

// remove search from header
add_action( 'init', 'st_remove_storefront_header_search' );
function st_remove_storefront_header_search() {
    remove_action( 'storefront_header', 'storefront_product_search', 40 ); 
}

// remove cart from site-navigation
// add_action( 'init', 'st_remove_actions' );
// function st_remove_actions() {
// 	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
// }

// remove sidebar
add_action( 'init', 'st_remove_sidebar' );
function st_remove_sidebar() {
    remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
}

if ( ! function_exists( 'storefront_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function storefront_header_cart() {
		if ( storefront_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
		?>
		<?php
		}
	}
}