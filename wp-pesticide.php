<?php
/*
Plugin Name: WP Pesticide
Plugin URI:  https://github.com/jchck/wp-pesticide
Description: Quickly add Pesticide.css to your WordPress theme for faster CSS debugging
Version:     1.0
Author:      Justin Chick
Author URI:  http://jstn.ch/ck
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

/**
 *
 * Namespace our PHP file to avoid collisions
 * @link http://php.net/manual/en/language.namespaces.php
 *
 */
namespace jchck\pesticide;

/**
 *
 * Enqueue our stylesheets
 * @uses https://developer.wordpress.org/reference/functions/wp_enqueue_style
 *
 */
function outline(){
	wp_enqueue_style('outline', plugins_url( 'styles/css/wp-pesticide-outline.css', __FILE__ ), false, null);
}
function depth(){
	wp_enqueue_style('depth', plugins_url( 'styles/css/wp-pesticide-depth.css', __FILE__ ), false, null);
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

function build_page(){
	add_management_page( 'WP Pesticide', 'WP Pesticide', 'manage_options', 'wp-pesticide', __NAMESPACE__ . '\\build_page' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\build_page' );