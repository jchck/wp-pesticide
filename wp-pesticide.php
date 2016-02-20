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




function pesticide_options(){
	/* Register section */
	add_settings_section( 'setting_section_id', 'Section Title', __NAMESPACE__ . '\\general_options_callback', 'general' );

	/* Register Fields */
	add_settings_field( 'pesticide_outline', 'Setting Title A', __NAMESPACE__ . '\\header_field_callback', 'general', 'setting_section_id', array(
		'This is inside the array'
	) );
	add_settings_field( 'pesticide_depth', 'Setting Title B', __NAMESPACE__ . '\\content_field_callback', 'general', 'setting_section_id', array(
		'This is inside the array'
	) );

	/* Register Settings */
	register_setting( 'general', 'pesticide_outline' );
	register_setting( 'general', 'pesticide_depth' );
	
	
}
add_action( 'admin_init', __NAMESPACE__ . '\\pesticide_options' );

function general_options_callback(){
	echo '<p>Section title, etc</p>';
}

function header_field_callback( $args ){
	$html = '<input type="checkbox" id="pesticide_outline" name="pesticide_outline" value="1"' . checked(1, get_option('pesticide_outline'), false) . '/>';

	$html .= '<label for="pesticide_outline"> '  . $args[0] . '</label>';

	echo $html;
}

function content_field_callback( $args ){
	$html = '<input type="checkbox" id="pesticide_depth" name="pesticide_depth" value="1"' . checked(1, get_option('pesticide_depth'), false) . '/>';

	$html .= '<label for="pesticide_depth"> '  . $args[0] . '</label>';

	echo $html;
}