<?php

namespace jchck\pesticide\page;

function page(){
	add_menu_page( 'WP Pesticide', 'WP Pesticide', 'administrator', 'pesticide', __NAMESPACE__ . '\\page_display' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\page' );

function page_display(){
	$html = '<div class="wrap">';
	$html .= '<h2>Hello</h2>';
	$html .= '</div>';

	echo $html;
}