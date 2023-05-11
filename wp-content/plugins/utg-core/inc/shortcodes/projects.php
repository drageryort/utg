<?php

add_shortcode( 'utg_projects', 'utg_projects' );

function utg_projects( $atts ) {
	$atts = shortcode_atts( array(
		'type'      => 'grid',
    'post-type' => '',
    'taxonomy'  => '',
    'terms'     => '',
		'category'  => '',
	), $atts );

	if ( ! empty( $atts['category'] ) ) {
		$args['meta_query'] = array(
			array(
				'key'     => 'category',
				'value'   => $atts['category'],
				'compare' => 'LIKE'
			)
		);
	}

	if($atts['taxonomy']){
        $posts = get_posts(array(
            'post_type' => $atts['post-type'],
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $atts['taxonomy'],
                    'field'    => 'slug',
                    'terms' => $atts['terms'],
                )
            )
        ));
    }
	else {
        $posts = get_posts(array(
            'numberposts' => -1,
            'post_type' => $atts['post-type'],
            'tax_query' => array()
        ));
    }

	if ( empty( $posts ) ) {
		return '';
	}

	global $post;
	ob_start();
	echo '<div class="active archive-project type-' . $atts['type'] . '">';

	foreach ( $posts as $post ) {
		setup_postdata( $post );
		if($atts['post-type'] === 'project'){
      get_template_part( 'template-parts/archive-content-active-projects-slider-el');
    }
		 else{
       get_template_part( 'template-parts/archive-content', get_post_type() );
     }
	}
	echo '</div>';
	echo '<div class="test container counter-block">
                <div class="gallery-counter active-project">
                    <span class="slide-current">1</span>
                    <span class="slides-counter"> ' . count( $posts ) . '</span>
                </div>
          </div>';
	wp_reset_postdata();

	return ob_get_clean();
}
