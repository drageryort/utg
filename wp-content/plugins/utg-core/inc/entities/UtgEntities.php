<?php

class UtgEntities {
	private static ?UtgEntities $instance = null;
	protected string $post_type;

	static public function getInstance() {
		if ( self::$instance === null ) {
			self::$instance = new UtgEntities();
		}

		return self::$instance;
	}

	public function __construct() {
		$this->post_type = '';
	}

	function get_items( $atts = array() ) {
		$args = array(
			'post_type'   => $this->post_type,
			'post_status' => 'publish',
			'numberposts' => ! empty( $atts['count'] ) ? $atts['count'] : '-1',
			'orderby'     => ! empty( $atts['orderby'] ) ? $atts['orderby'] : 'id',
			'order'       => ! empty( $atts['order'] ) ? $atts['order'] : 'ASC',
		);
		if ( ! empty( $atts['meta_query'] ) ) {
			$args['meta_query'] = $atts['meta_query'];
		}
		if ( ! empty( $atts['tax_query'] ) ) {
			$args['tax_query'] = $atts['tax_query'];
		}
		$items = new WP_Query( $args );

		return ! empty( $items->posts ) ? $items->posts : array();
	}

	function get_items_info( $atts = array() ) {
		$items = $this->get_items( $atts );

		if ( ! empty( $items ) ) {
			$items_info = array_map( function ( $item ) {
				return $this->item_response( $item );
			}, $items );
		}

		return ! empty( $items_info ) ? $items_info : array();
	}

	function get_item_info( $id ) {
		return $this->item_response( get_post( $id ) );
	}

	function item_response( $item ) {
		return (object) $item;
	}
}
