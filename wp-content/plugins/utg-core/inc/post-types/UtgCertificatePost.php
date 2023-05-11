<?php

class UtgCertificatePost extends UtgPost {

	public function __construct() {
		$this->post_type = 'awards';
		$this->post_name = __( 'Награды и титулы', UTG_CORE_DOMAIN );
		parent::__construct();
	}

	function register_post_types() {
		register_post_type( $this->post_type, array(
			'label'               => null,
			'labels'              => array(
				'name'          => $this->post_name,
				'singular_name' => $this->post_name,
				'menu_name'     => $this->post_name,
			),
			'description'         => 'Награды и титулы',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => null,
			'show_ui'             => null,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => null,
			'show_in_nav_menus'   => null,
			'show_in_rest'        => false,
			'rest_base'           => null,
			'menu_position'       => null,
			'menu_icon'           => null,
			'hierarchical'        => false,
			'supports'            => array( 'title', 'thumbnail' ),
			'taxonomies'          => array(),
			'rewrite'             => array( 'slug' => '', 'with_front' => true ),
			'has_archive'         => true,
			'query_var'           => true,
            'with_front'          => true,
		) );
	}



	function register_acf_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( array(
				'key'                   => 'group_awards',
				'title'                 => 'Награды и титулы',
				'fields'                => array(
                    array(
                        'key' => 'field_awards_description',
                        'label' => 'Описание',
                        'name' => 'awards_description',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '70',
                            'class' => 'description',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
				    array(
                        'key' => 'field_awards_date',
                        'label' => 'Месяц и год',
                        'name' => 'awards_date',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => $this->post_type,
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
			) );
		}
	}

}
