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

/**
 *
 * Fire the enqueued styles, note the use of __NAMESPACE__ constant in the second parameter
 * @uses https://developer.wordpress.org/reference/functions/add_action
 * @link http://php.net/manual/en/language.namespaces.nsconstants.php 
 *
 */
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\outline');
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\depth');