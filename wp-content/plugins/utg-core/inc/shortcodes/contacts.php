<?php

add_shortcode( 'utg_contacts', 'utg_contacts' );

function utg_contacts( $atts ) {
	if ( ! function_exists( 'get_field' ) ) {
		return '';
	}

	$atts = shortcode_atts( array(
		'items'   => '',
		'icons'   => 0,
		'post_id' => 'options'
	), $atts );

	$atts['items'] = explode( ',', $atts['items'] );

	ob_start();

	$contacts = get_field( 'contacts', $atts['post_id'] );

	if ( ! empty( $contacts ) && ! empty( $atts['items'] ) ) {
		echo '<div class="contacts">';

		foreach ( $atts['items'] as $type ) {
			$items = ! empty( $contacts[ $type ] ) ? $contacts[ $type ] : null;

			if ( empty( $items ) ) {
				continue;
			}

			echo '<div class="item">';

			if ( $atts['icons'] ) {
				echo do_shortcode( '[icp_icon type="' . $type . '"]' );
			}

			echo '<span class="text">' . utg_contacts_items( $items, $type ) . '</span>';

			echo '</div>';
		}

		echo '</div>';
	}

	return ob_get_clean();
}

function utg_contacts_items( $items, $type ) {
  if($type==='phone'){
    return implode( '<br>', array_map( function ( $item ) {
      $html = ! empty( $item['link'] ) ? '<a href="tel:' . $item['link'] . '">' : '';
      $html .= $item['item'];
      $html .= ! empty( $item['link'] ) ? '</a>' : '';
      return $html;
    }, $items ) );
  }
  elseif ($type==='mail'){
    return implode( '<br>', array_map( function ( $item ) {
      $html = ! empty( $item['link'] ) ? '<a href="mailto:' . $item['link'] . '">' : '';
      $html .= $item['item'];
      $html .= ! empty( $item['link'] ) ? '</a>' : '';
      return $html;
    }, $items ) );
  }
  else{
    return implode( '<br>', array_map( function ( $item ) {
      $html = ! empty( $item['link'] ) ? '<a href="' . $item['link'] . '">' : '';
      $html .= $item['item'];
      $html .= ! empty( $item['link'] ) ? '</a>' : '';
      return $html;
    }, $items ) );
  }

}
