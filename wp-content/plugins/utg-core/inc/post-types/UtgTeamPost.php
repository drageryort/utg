<?php

class UtgTeamPost extends UtgPost {

	public function __construct() {
		$this->post_type = 'team';
		$this->post_name = __( 'Team UTG', UTG_CORE_DOMAIN );
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
			'description'         => 'Команда UTG',
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
			'taxonomies'          => array('team_department'),
			'rewrite'             => array( 'slug' => '', 'with_front' => true ),
			'has_archive'         => true,
			'query_var'           => true,
            'with_front'          => true,
		) );
        register_taxonomy( 'team_department', 'team',
            array(
                'labels' => array(
                    'name' => __('Департамент', UTG_CORE_DOMAIN)
                )
            )
        );
        register_taxonomy_for_object_type( 'team_department', 'team' );
	}



	function register_acf_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( array(
				'key'                   => 'group_team',
				'title'                 => 'Опции команды',
				'fields'                => array(
					array(
						'key'               => 'field_description',
						'label'             => 'Краткое описание',
						'name'              => 'description',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
                    array(
                        'key'               => 'field_biography',
                        'label'             => 'Биография',
                        'name'              => 'biography',
                        'type'              => 'textarea',
                        'instructions'      => '',
                        'required'          => 1,
                        'conditional_logic' => 0,
                        'wrapper'           => array(
                            'width'         => '',
                            'class'         => '',
                            'id'            => '',
                        ),
                        'default_value'     => '',
                        'placeholder'       => '',
                        'maxlength'         => '',
                        'rows'              => '',
                        'new_lines'         => 'wpautop',
                    ),
					array(
						'key'               => 'field_contacts',
						'label'             => 'Контакты',
						'name'              => 'contacts',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'layout'            => 'row',
						'sub_fields'        => UtgAcfInit::acf_get_contact_fields()
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
