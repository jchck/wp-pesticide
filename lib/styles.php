<?php

namespace jchck\pesticide\styles;

/**
 *
 * Enqueue our stylesheets
 * @uses https://developer.wordpress.org/reference/functions/wp_enqueue_style
 *
 */
function outline(){
	wp_enqueue_style('outline', plugins_url( 'styles/css/wp-pesticide-outline.css', dirname( __FILE__ ) ), false, null);
}
function depth(){
	wp_enqueue_style('depth', plugins_url( 'styles/css/wp-pesticide-depth.css', dirname( __FILE__ ) ), false, null);
}


add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\outline');


/**
 *
 * Uncomment to enque depth support as well
 *
 */
//add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\depth');