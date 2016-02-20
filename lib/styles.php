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
 * Fire the enqueued styles if enabled in the options
 * 
 * Note the use of __NAMESPACE__ constant in the second parameter
 * 
 * @uses http://codex.wordpress.org/Function_Reference/get_option
 * @uses https://developer.wordpress.org/reference/functions/add_action
 * @link http://php.net/manual/en/language.namespaces.nsconstants.php 
 *
 */
if (get_option( 'pesticide_outline' )) {
	add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\outline');
}

if (get_option( 'pesticide_depth' )) {
	add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\depth');
}