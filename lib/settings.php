<?php

namespace jchck\pesticide\settings;

function default_display(){
	$defaults = array(
		'pesticide_outline' => '',
		'pesticide_depth'	=> ''
	);
	return apply_filters( 'default_display', $defaults );
}

/**
 *
 * This is where we build our options via the settings API
 * First we're going to build settings and then we're going to pass options to them
 * @link https://codex.wordpress.org/Settings_API
 *
 */

function pesticide_options(){

	if ( false == get_option( 'wp_pesticide_settings' )) {
		add_option( 'wp_pesticide_settings', add_filter( __NAMESPACE__ . '\\default_display', default_display() ) );
	}

	/**
	 *
	 * First, we register a section which the settins will live in
	 * @uses http://codex.wordpress.org/Function_Reference/add_settings_section
	 *
	 */
	add_settings_section( 'wp_pesticide_id', '', '', 'wp_pesticide_settings' );

	/**
	 *
	 * Next, we register fields which make up the section registered above
	 * @uses https://developer.wordpress.org/reference/functions/add_settings_field
	 *
	 */
	add_settings_field( 'pesticide_outline', __('Add Outlining', 'jchck'), __NAMESPACE__ . '\\outline', 'wp_pesticide_settings', 'wp_pesticide_id' );
	add_settings_field( 'pesticide_depth', __('Add Depth', 'jchck'), __NAMESPACE__ . '\\depth', 'wp_pesticide_settings', 'wp_pesticide_id' );

	/**
	 *
	 * Then we register the settings inside the fields
	 * @uses https://developer.wordpress.org/reference/functions/register_setting
	 *
	 */
	register_setting( 'wp_pesticide_settings', 'wp_pesticide_settings' );
	// register_setting( 'wp_pesticide_settings', 'pesticide_outline' );
	// register_setting( 'wp_pesticide_settings', 'pesticide_depth' );
}

/**
 *
 * Finally, we attach pesticide_options to the admin_init action hook
 * @uses https://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
 *
 */
add_action( 'admin_init', __NAMESPACE__ . '\\pesticide_options' );


/**
 *
 * The next two functions make up the checkboxes on the options page, they're both called from cooresponding add_settings_field's above
 * Note the differences between the two
 * @uses https://developer.wordpress.org/reference/functions/add_settings_field
 *
 */
function outline( $args ){
	$options = get_option('wp_pesticide_settings');

	$html = '<input type="checkbox" id="pesticide_outline" name="sandbox_theme_display_options[pesticide_outline]" value="1" ' . checked( 1, isset( $options['pesticide_outline'] ) ? $options['pesticide_outline'] : 0, false ) . '/>'; 

	echo $html;
}

function depth( $args ){
	$options = get_option( 'wp_pesticide_settings' );

	$html = '<input type="checkbox" id="pesticide_depth" name="sandbox_theme_display_options[pesticide_depth]" value="1" ' . checked( 1, isset( $options['pesticide_depth'] ) ? $options['pesticide_depth'] : 0, false ) . '/>';
	
	echo $html;
}