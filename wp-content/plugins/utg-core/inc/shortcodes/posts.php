<?php

add_shortcode( 'utg_posts', 'utg_posts' );

function utg_posts( $atts ) {
	$atts = shortcode_atts( array(
		'type' => '',
	), $atts );

	if ( ! empty( $atts['type'] ) ) {
		$args['meta_query'] = array(
			array(
				'key'     => 'category',
				'value'   => $atts['type'],
				'compare' => 'LIKE'
			)
		);
	}

	$posts = ( new UtgNews() )->get_items();

	if ( empty( $posts ) ) {
		return '';
	}

	global $post;
	ob_start();

	echo '<div class="archive-post">';
	foreach ( $posts as $post ) {
		setup_postdata( $post );
		get_template_part( 'template-parts/archive-content', get_post_type() );
	}
	echo '</div>';
	wp_reset_postdata();

	return ob_get_clean();
}
