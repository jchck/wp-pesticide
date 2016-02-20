<?php

namespace jchck\pesticide\settings;

/**
 *
 * This is where we build our options via the settings API
 * First we're going to build settings and then we're going to pass options to them
 * @link https://codex.wordpress.org/Settings_API
 *
 */

function pesticide_options(){

	if ( false == get_option( 'sandbox_theme_display_options' )) {
		add_option( 'sandbox_theme_display_options' );
	}

	/**
	 *
	 * First, we register a section which the settins will live in
	 * @uses http://codex.wordpress.org/Function_Reference/add_settings_section
	 *
	 */
	add_settings_section( 'setting_section_id', '', '', 'sandbox_theme_display_options' );

	/**
	 *
	 * Next, we register fields which make up the section registered above
	 * @uses https://developer.wordpress.org/reference/functions/add_settings_field
	 *
	 */
	add_settings_field( 'pesticide_outline', 'Add Outlining', __NAMESPACE__ . '\\outline', 'sandbox_theme_display_options', 'setting_section_id', array(
		'This is inside the array'
	) );
	add_settings_field( 'pesticide_depth', 'Add Depth', __NAMESPACE__ . '\\depth', 'sandbox_theme_display_options', 'setting_section_id', array(
		'This is inside the array'
	) );

	/**
	 *
	 * Then we register the settings inside the fields
	 * @uses https://developer.wordpress.org/reference/functions/register_setting
	 *
	 */
	register_setting( 'sandbox_theme_display_options', 'sandbox_theme_display_options' );	
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
	$options = get_option( 'sandbox_theme_display_options' );

	$html = '<input type="checkbox" id="pesticide_outline" name="sandbox_theme_display_options[pesticide_outline]" value="1" ' . checked(1, $options['pesticide_outline'], false) . '/>';

	$html .= '<label for="show_header"> '  . $args[0] . '</label>';

	echo $html;
}

function depth( $args ){
	$options = get_option( 'sandbox_theme_display_options' );

	$html = '<input type="checkbox" id="pesticide_depth" name="sandbox_theme_display_options[pesticide_depth]" value="1" ' . checked(1, $options['pesticide_depth'], false) . '/>';

	$html .= '<label for="show_header"> '  . $args[0] . '</label>';

	echo $html;
}