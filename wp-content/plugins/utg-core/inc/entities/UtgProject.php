<?php

class UtgProject extends UtgEntities {

	public function __construct() {
		parent::__construct();
		$this->post_type = 'project';
	}

	public static function get_features( $post_id = null ) {
		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}
		$fields = get_fields( $post_id );

		return array(
			array(
				'key'   => 'type',
				'label' => __( 'Property type', 'utg' ),
				'value' => ! empty( $fields['type'] ) ? implode( ', ', $fields['type'] ) : null
			),
			array(
				'key'   => 'service',
				'label' => __( 'Service type', 'utg' ),
				'value' => ! empty( $fields['service'] ) ? $fields['service'] : null
			),
			array(
				'key'   => 'format',
				'label' => __( 'Object format', 'utg' ),
				'value' => ! empty( $fields['format'] ) ? $fields['format'] : null
			),
			array(
				'key'   => 'parking_count',
				'label' => __( 'Number of parking spaces', 'utg' ),
				'value' => ! empty( $fields['parking_count'] ) ? $fields['parking_count'] : null
			),
			array(
				'key'   => 'class',
				'label' => __( 'Property class', 'utg' ),
				'value' => ! empty( $fields['class'] ) ? $fields['class'] : null
			),
			array(
				'key'   => 'shop_count',
				'label' => __( 'Number of stores', 'utg' ),
				'value' => ! empty( $fields['shop_count'] ) ? $fields['shop_count'] : null
			),
		);
	}

}
