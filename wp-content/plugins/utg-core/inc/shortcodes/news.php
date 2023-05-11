<?php

add_shortcode( 'utg_news', 'utg_news' );

function utg_news( $atts ) {
	$atts = shortcode_atts( array(
		'category' => 'news',
        'post_limit' => 5,
	), $atts );

	$args['order']     = 'DESC';
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array( $atts['category'] )
		)
	);

	$news = ( new UtgNews() )->get_items( $args );

	if ( empty( $news ) ) {
		return '';
	}

	global $post;
	ob_start();

	//this block is rendered on home page!!!
	echo '<div class="archive-post archive-' . $atts['category'] . '">';


    $post_limit = $atts['post_limit'];
    $post_number = 0;
	foreach ( $news as $post ) {
        setup_postdata( $post );
        get_template_part( 'template-parts/archive-content-home-' . $atts['category'] . '');
        if(++$post_number >=$post_limit) break;
    }

	echo '</div>';
	wp_reset_postdata();

	return ob_get_clean();
}
