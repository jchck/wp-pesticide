<?php

namespace jchck\pesticide\options;

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