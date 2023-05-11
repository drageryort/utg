<?php

class UtgProjectFilter {

	private $type = '';

	public function __construct() {
		add_action( 'init', array( $this, 'register_acf_page' ) );
		add_action( 'init', array( $this, 'register_acf_filter_options' ) );
		add_action( 'init', array( $this, 'register_acf_project_filters' ) );
		add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );
		add_shortcode( 'utg_project_filter', array( $this, 'utg_project_filter' ) );
	}

	public function pre_get_posts( $query ) {
    if ( ! is_admin() && $post_type = 'post'){
      $query->set( 'orderby', 'date' );
      $query->set( 'order', 'DESC');
    }
		if ( ! is_admin() && isset( $_REQUEST['utg_filter'] ) && $query->is_main_query() ) {
			$filter_args = self::get_filter_args( $_REQUEST );
			$query->set( 'meta_query', $filter_args );
		}
	}

	public function get_filter_args( $request ) {
		$query_args = array();
		if ( ! empty( $request ) ) {
			$query_args['relation'] = 'AND';
			foreach ( $request as $key => $value ) {
				if ( $this->starts_with( $key, 'project_filter_' ) ) {
					$items                          = is_array( $request[ $key ] ) ? $request[ $key ] : explode( ',', $request[ $key ] );
					$query_args[ $key ]['relation'] = 'OR';
					if ( ! empty( $value ) ) {
						foreach ( $items as $item ) {
							if ( ! empty( $item ) ) {
								$query_args[ $key ][] = array(
									'key'     => $key,
									'value'   => $item,
									'compare' => 'LIKE'
								);
							}
						}
					}
				}
			}
		}

		return $query_args;
	}

	public function filter_form() {

		if ( empty( $this->get_filter_params() ) ) {
			return '';
		}
		$ret = '';

		$ret .= '<form action="" method="get" class="utg-filter-form type-' . $this->type . '">';
		$ret .= '<input type="hidden" name="utg_filter" value="true">';

		foreach ( $this->get_filter_params() as $param ) {
			switch ( $param['type'] ) {
				case 'select':
					if ( empty( $param['choices'] && !(get_queried_object()->slug == 'developed' && !wp_is_mobile() && $param['name'] == 'project_filter_year')) ) {
						break;
					}
					$ret .= '<div class="select-wrap param-block block-' . $param['name'] . '">';
                        $ret .= '<label class="select-type">';
                            $ret .= '<span class="block-title">' . $param['label'] . '</span>';
                            $ret .= '<select name="' . $param['name'] . '">';
                                foreach ( $param['choices'] as $key => $choice ) {
                                    $selected = self::is_param_selected( $param['name'], $key ) ? ' selected="selected"' : '';
                                    $ret      .= '<option value="' . $key . '" ' . $selected . '>' . $choice . '</option>';
                                }
                            $ret .= '</select>';
                        $ret .= '</label>';
                    $ret .= '</div>';
					break;
				case 'radio':
					if ( empty( $param['choices'] && !(wp_is_mobile() && get_queried_object()->slug == 'developed' && $param['name'] == 'project_filter_year'))) {
						break;
					}
					$ret .= '<div class="radio-wrap param-block block-' . $param['name'] . '">';
					$ret .= '<div class="block-content choices-wrap type-radio">';
					foreach ( $param['choices'] as $key => $choice ) {
						$selected = self::is_param_selected( $param['name'], $key ) ? ' checked="true"' : '';
						$ret      .= '<div class="choice-item">';
						$ret      .= '<input  type="' . $param['type'] . '" name="' . $param['name'] . '" value="' . $key . '" id="' . $param['name'] . '-' . $key . '"' . $selected . '>';
						$ret      .= '<label for="' . $param['name'] . '-' . $key . '"><span>' . $choice . '</span></label>';
						$ret      .= '</div>';
					}
					$ret .= '</div>';
					$ret .= '</div>';
					break;
				case 'checkbox':
					if ( empty( $param['choices'] ) ) {
						break;
					}
					$ret .= '<div class="param-block block-' . $param['name'] . '">';
					$ret .= '<label class="block-title" for="' . $param['name'] . '">' . $param['label'] . '</label>';
					$ret .= '<div class="block-content choices-wrap type-checkbox">';
					foreach ( $param['choices'] as $key => $choice ) {
						$selected = self::is_param_selected( $param['name'], $key ) ? ' checked="true"' : '';
						$ret      .= '<div class="choice-item">';
						$ret      .= '<input type="' . $param['type'] . '" name="' . $param['name'] . '[]" value="' . $key . '" id="' . $param['name'] . '-' . $key . '"' . $selected . '>';
						$ret      .= '<label for="' . $param['name'] . '-' . $key . '"><span>' . $choice . '</span></label>';
						$ret      .= '</div>';
					}
					$ret .= '</div>';
					$ret .= '</div>';
					break;
			}
		}
		$ret .= '<button class="btn btn-primary submit-wrap" type="submit">' . __( 'Search', UTG_CORE_DOMAIN ) . '</button>';
		$ret .= '</form>';

		return $ret;
	}

	private function get_filter_params() {
		$options = array(
			array(
				'name'      => 'project_filter_region',
				'label'     =>  __( 'Region', UTG_CORE_DOMAIN ),
				'type'      => 'select',
				'choices'   => $this->get_filter_options_choices( 'region' ),
				'actual'    => true,
				'developed' => true,
				'realized'  => true,
			),
			array(
				'name'      => 'project_filter_city',
				'label'     => __( 'City', UTG_CORE_DOMAIN ),
				'type'      => 'select',
				'choices'   => $this->get_filter_options_choices( 'cities' ),
				'actual'    => true,
				'developed' => true,
				'realized'  => true,
			),
			array(
				'name'      => 'project_filter_year',
				'label'     => __( 'Launch year', UTG_CORE_DOMAIN ),
				'type'      => 'select',
				'choices'   => $this->get_filter_options_choices( 'year' ),
				'actual'    => false,
				'developed' => true,
				'realized'  => true,
			),
            array(
                'name'      => 'project_filter_year',
                'label'     => __( 'Launch year', UTG_CORE_DOMAIN ),
                'type'      => 'radio',
                'choices'   => $this->get_filter_options_choices( 'year' ),
                'actual'    => false,
                'developed' => true,
                'realized'  => false,
            ),
			array(
				'name'      => 'project_filter_service',
				'label'     => __( 'Work type', UTG_CORE_DOMAIN ),
				'type'      => 'select',
				'choices'   => $this->get_filter_options_choices( 'services' ),
				'actual'    => false,
				'developed' => true,
				'realized'  => false,
                'multiple' => 1,
			),
			array(
				'name'      => 'project_filter_type',
				'label'     => __( 'Estate type', UTG_CORE_DOMAIN ),
				'type'      => 'radio',
				'choices'   => $this->get_filter_options_choices( 'types' ),
				'actual'    => true,
				'developed' => false,
				'realized'  => true,
			),
            array(
                'name'      => 'project_filter_type',
                'label'     => __( 'Estate type', UTG_CORE_DOMAIN ),
                'type'      => 'select',
                'multiple' => 1,
                'choices'   => $this->get_filter_options_choices( 'types' ),
                'actual'    => false,
                'developed' => true,
                'realized'  => false,
            ),
		);

		if ( ! empty( $this->type ) ) {
			$type    = $this->type;
			$options = array_filter( $options, function ( $field ) use ( $type ) {
				return ! empty( $field[ $type ] );
			} );
		}

		return ! empty( $options ) ? $options : array();
	}

	public static function is_param_selected( $key, $value ) {
		if ( ! array_key_exists( $key, $_REQUEST ) ) {
			return false;
		}
		if ( is_array( $_REQUEST[ $key ] ) ) {
			return in_array( $value, $_REQUEST[ $key ] );
		} else {
			return $_REQUEST[ $key ] == $value;
		}
	}

	public function utg_project_filter( $atts ) {
		$atts       = shortcode_atts( array(
			'type' => ''
		), $atts );
		$this->type = $atts['type'];

		return $this->filter_form();
	}

	public function register_acf_page() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( array(
				'page_title' => __( 'Projects Options', UTG_CORE_DOMAIN ),
				'menu_title' => __( 'Projects Options', UTG_CORE_DOMAIN ),
				'menu_slug'  => 'projects-filter',
				'capability' => 'manage_options',
				'redirect'   => false
			) );
		}
	}

	public function register_acf_filter_options() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( array(
				'key'                   => 'group_project_filters',
				'title'                 => 'Фильтр проектов',
				'fields'                => array(
					array(
						'key'               => 'field_project_region',
						'label'             => 'Область',
						'name'              => 'project_region',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => $this->get_filter_options_sub_fields( 'project_region' )
					),
					array(
						'key'               => 'field_project_cities',
						'label'             => 'Город',
						'name'              => 'project_cities',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => $this->get_filter_options_sub_fields( 'project_cities' )
					),
					array(
						'key'               => 'field_project_types',
						'label'             => 'Тип недвижимости',
						'name'              => 'project_types',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => $this->get_filter_options_sub_fields( 'project_types' )
					),
					array(
						'key'               => 'field_project_services',
						'label'             => 'Вид работ',
						'name'              => 'project_services',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => $this->get_filter_options_sub_fields( 'project_services' )
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'projects-filter',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			) );
		}
	}

	private function get_filter_options_sub_fields( $field = '' ) {
		return array(
			array(
				'key'               => 'field_' . $field . '_key',
				'label'             => 'Ключ',
				'name'              => 'key',
				'type'              => 'text',
				'instructions'      => 'Название латиницей без пробелов и спец. символов',
				'required'          => 1,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '50',
					'class' => '',
					'id'    => '',
				),
			),
			array(
				'key'               => 'field_' . $field . '_value',
				'label'             => 'Название',
				'name'              => 'value',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 1,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '50',
					'class' => '',
					'id'    => '',
				),
			),
		);
	}

	public function register_acf_project_filters() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			$params = $this->get_filter_params();
			foreach ( $params as $param ) {
				$param['key'] = 'field_' . $param['name'];
				$fields[]     = $param;
			}
			acf_add_local_field_group( array(
				'key'                   => 'group_project_filter',
				'title'                 => 'Фильтр проекта',
				'fields'                => ! empty( $fields ) ? $fields : array(),
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
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
			) );
		}
	}

	private function get_filter_options_choices( $type ) {
		$choices = array();
		switch ( $type ) {
			case 'year':
				$years   = range( date( 'Y' ) + 3, 2001 );
				$choices = array_combine( $years, $years );
				break;
			default:
				$values = get_field( 'project_' . $type, 'options' );
				if ( is_array( $values ) && ! empty( array_column( $values, 'value' ) ) ) {
					foreach ( $values as $value ) {
						$choices[ $value['key'] ] = $value['value'];
					}
				}
				break;
		}
        if ( ! empty( $choices ) && $type == 'year') {
            $choices = array( __( 'All years', UTG_CORE_DOMAIN ) ) + $choices;
        }
		else if ( ! empty( $choices ) ) {
			$choices = array( __( 'All', UTG_CORE_DOMAIN ) ) + $choices;
		}

		return $choices;
	}

	function starts_with( $haystack, $needle ) {
		$length = strlen( $needle );

		return ( substr( $haystack, 0, $length ) === $needle );
	}
}