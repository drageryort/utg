<?php

add_shortcode( 'icp_icon', 'icp_icon' );

function icp_icon( $atts ) {
	$atts = shortcode_atts( array(
		'type'  => '',
		'class' => 'icon-left'
	), $atts );

	return '<span class="icp-icon ' . $atts['class'] . '">' . icp_get_icon( 'icon-' . $atts['type'] ) . '</span>';
}

function icp_get_icon( $name ) {
	if ( file_exists( get_template_directory() . '/assets/images/' . $name . '.svg' ) ) {
		return file_get_contents( get_template_directory() . '/assets/images/' . $name . '.svg' );
	}

	return null;
}