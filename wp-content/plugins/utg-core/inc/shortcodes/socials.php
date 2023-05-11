<?php

add_shortcode( 'utg_socials', 'utg_socials' );

function utg_socials() {
	if ( ! function_exists( 'get_field' ) ) {
		return '';
	}

	ob_start();

	$socials = get_field( 'socials', 'options' );

	if ( ! empty( $socials ) ) {
		echo '<div class="socials">';

		foreach ( $socials as $item ) {
			echo '<a href="' . $item['link'] . '" class="item" target="_blank">';
			echo '<span class="icon"><i class="fab fa-' . $item['type'] . '"></i></span>';
			echo '</a>';
		}

		echo '</div>';
	}

	return ob_get_clean();
}
