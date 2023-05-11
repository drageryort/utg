<?php

class UtgProjectPost extends UtgPost {

	public function __construct() {
		$this->post_type = 'project';
		$this->post_name = __( 'Projects', UTG_CORE_DOMAIN );
		parent::__construct();

		add_action( 'pre_get_posts', array( $this, 'post_order_by_menu_order' ) );
	}

	function post_class( $classes, $class, $post_id ) {
		if ( get_post_type( $post_id ) == $this->post_type ) {
			$classes[] = $this->post_type . '-item';
			if ( function_exists( 'get_field' ) ) {
				$classes[] = 'project-' . get_field( 'project_type', $post_id );
			}
		}

		return $classes;
	}

	function register_post_types() {
		register_post_type( $this->post_type, array(
			'label'               => null,
			'labels'              => array(
				'name'          => $this->post_name,
				'singular_name' => __( 'Project', UTG_CORE_DOMAIN ),
				'menu_name'     => $this->post_name,
			),
			'description'         => '',
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
			'hierarchical'        => true,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'taxonomies'          => array(),
			'rewrite'             => array( 'slug' => '', 'with_front' => false ),
			'has_archive'         => true,
			'query_var'           => true,
		) );
        register_taxonomy( 'project_status', 'project',
            array(
                'labels' => array(
                    'name' => __('Статус проекта', UTG_CORE_DOMAIN)
                ),
            )
        );
        register_taxonomy_for_object_type( 'project_status', 'project' );
	}

	function register_acf_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( array(
				'key'                   => 'group_project',
				'title'                 => 'Опции проекта',
				'fields'                => array(
					array(
						'key'               => 'field_project_type',
						'label'             => 'Тип проекта',
						'name'              => 'project_type',
						'type'              => 'radio',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'choices'           => array(
							'current'   => 'Текущий',
							'fulfilled' => 'Выполненный',
                            'developed' => 'Разработанный'
						),
						'allow_null'        => 0,
						'other_choice'      => 0,
						'default_value'     => '',
						'layout'            => 'horizontal',
						'return_format'     => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key'               => 'field_city',
						'label'             => 'Город',
						'name'              => 'city',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'fulfilled',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_address',
						'label'             => 'Адрес',
						'name'              => 'address',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_area',
						'label'             => 'Общая пл. (GBA)',
						'name'              => 'area',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'fulfilled',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => 'кв.м',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_rent_area',
						'label'             => 'Арендная пл. (GLA)',
						'name'              => 'rent_area',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => 'кв.м',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_date',
						'label'             => 'Статус',
						'name'              => 'date',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => array(
							array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'fulfilled',
                                ),
                            ),
						),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_dates',
						'label'             => 'Участие в проекте',
						'name'              => 'dates',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_project_type',
									'operator' => '==',
									'value'    => 'fulfilled',
								),
							),
						),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
                    array(
                        'key'               => 'field_developed_year',
                        'label'             => 'Год',
                        'name'              => 'developed_year',
                        'type'              => 'text',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => array(
                            'width' => '50',
                            'class' => '',
                            'id'    => '',
                        ),
                        'default_value'     => '',
                        'placeholder'       => '',
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ),
					array(
						'key'               => 'field_gallery',
						'label'             => 'Галерея',
						'name'              => 'gallery',
						'type'              => 'gallery',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'array',
						'preview_size'      => 'medium',
						'insert'            => 'append',
						'library'           => 'all',
						'min'               => '',
						'max'               => '',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
					),
					array(
						'key'               => 'field_type',
						'label'             => 'Тип недвижимости',
						'name'              => 'type',
						'type'              => 'checkbox',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'choices'           => array(
							'commercial'    => __( 'Commercial', UTG_CORE_DOMAIN ),
                            'office'        => __( 'Office', UTG_CORE_DOMAIN ),
                            'living'        => __( 'Living', UTG_CORE_DOMAIN ),
						),
						'allow_custom'      => 0,
						'default_value'     => array(),
						'layout'            => 'horizontal',
						'toggle'            => 0,
						'return_format'     => 'label',
						'save_custom'       => 0,
					),
					array(
						'key'               => 'field_service',
						'label'             => 'Вид услуг',
						'name'              => 'service',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_format',
						'label'             => 'Формат обьекта',
						'name'              => 'format',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_class',
						'label'             => 'Класс недвижимости',
						'name'              => 'class',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
					array(
						'key'               => 'field_parking_count',
						'label'             => 'Количество паркомест',
						'name'              => 'parking_count',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => 0,
						'max'               => '',
						'step'              => 1,
					),
					array(
						'key'               => 'field_shop_count',
						'label'             => 'Количество магазинов',
						'name'              => 'shop_count',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
						'wrapper'           => array(
							'width' => '50',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => 0,
						'max'               => '',
						'step'              => 1,
					),
                    array(
                        'key' => 'field_developer_logo',
                        'label' => 'Логотип девелопера',
                        'name' => 'developer_logo',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key'               => 'field_developer_name',
                        'label'             => 'Название девелопера',
                        'name'              => 'developer_name',
                        'type'              => 'text',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
                        'wrapper'           => array(
                            'width' => '50',
                            'class' => '',
                            'id'    => '',
                        ),
                        'default_value'     => '',
                        'placeholder'       => '',
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ),
                    array(
                        'key' => 'field_renter_list',
                        'label' => 'Якорные арендаторы',
                        'name' => 'renter_list',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'table',
                        'button_label' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_renter',
                                'label' => 'Арендаторы',
                                'name' => 'renter',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
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
                    ),
                    array(
                        'key'               => 'field_schemes',
                        'label'             => 'Схемы',
                        'name'              => 'schemes',
                        'type'              => 'gallery',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
                        'wrapper'           => array(
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ),
                        'return_format'     => 'array',
                        'preview_size'      => '',
                        'insert'            => 'append',
                        'library'           => 'all',
                        'min'               => '',
                        'max'               => '',
                        'min_width'         => '',
                        'min_height'        => '',
                        'min_size'          => '',
                        'max_width'         => '',
                        'max_height'        => '',
                        'max_size'          => '',
                        'mime_types'        => '',
                    ),

                    array(
                        'key' => 'field_contact_person',
                        'label'=> 'Контактное лицо',
                        'name' => 'contact_person',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'team',
                        ),
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'ui' => 1,
                    ),
                    array(
                        'key'               => 'field_presentation_link',
                        'label'             => 'Ссылка на презентацию',
                        'name'              => 'presentation_link',
                        'type'              => 'text',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
                        'wrapper'           => array(
                            'width' => '50',
                            'class' => '',
                            'id'    => '',
                        ),
                        'default_value'     => '',
                        'placeholder'       => '',
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ),
                    array(
                        'key'               => 'field_about_project_link',
                        'label'             => 'Ссылка о проекте',
                        'name'              => 'about_project_link',
                        'type'              => 'text',
                        'instructions'      => '',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field'    => 'field_project_type',
                                    'operator' => '==',
                                    'value'    => 'current',
                                ),
                            ),
                        ),
                        'wrapper'           => array(
                            'width' => '50',
                            'class' => '',
                            'id'    => '',
                        ),
                        'default_value'     => '',
                        'placeholder'       => '',
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ),

				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'project',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
				'description'           => '',
                'hide_on_screen' => array(
                    0 => 'the_content',
                ),
			) );
		}
	}

}
