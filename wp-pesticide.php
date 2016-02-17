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

namespace jchck\pesticide;

function outline(){
	wp_enqueue_style('outline', plugins_url( 'styles/css/wp-pesticide-outline.css', __FILE__ ), false, null);
}
function depth(){
	wp_enqueue_style('depth', plugins_url( 'styles/css/wp-pesticide-depth.css', __FILE__ ), false, null);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\outline');
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\depth');