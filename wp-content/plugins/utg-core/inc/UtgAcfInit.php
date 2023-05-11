<?php

class UtgAcfInit {
	private static ?UtgAcfInit $instance = null;

	static public function getInstance() {
		if ( self::$instance === null ) {
			self::$instance = new UtgAcfInit();
		}

		return self::$instance;
	}

	public function __construct() {
		add_action( 'init', array( $this, 'acf_option_pages' ) );
		add_action( 'init', array( $this, 'acf_contacts_fields' ) );
	}

	public function acf_option_pages() {
		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page( array(
				'page_title' => __( 'Contacts', UTG_CORE_DOMAIN ),
				'menu_title' => __( 'Contacts', UTG_CORE_DOMAIN ),
				'menu_slug'  => 'site-contacts',
				'capability' => 'edit_posts',
				'redirect'   => false
			) );

			acf_add_options_page( array(
				'page_title' => __( 'Site Options', UTG_CORE_DOMAIN ),
				'menu_title' => __( 'Site Options', UTG_CORE_DOMAIN ),
				'menu_slug'  => 'site-options',
				'capability' => 'edit_posts',
				'redirect'   => false
			) );

		}
	}

	public function acf_contacts_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group( array(
				'key'                   => 'group_contacts',
				'title'                 => 'Контакты',
				'fields'                => array(
					array(
						'key'               => 'field_socials',
						'label'             => 'Соц. сети',
						'name'              => 'socials',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => array(
							array(
								'key'               => 'field_socials_type',
								'label'             => 'Соц. сеть',
								'name'              => 'type',
								'type'              => 'select',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'choices'           => array(
									'facebook-f' => 'facebook',
									'instagram'  => 'instagram',
									'youtube'    => 'youtube',
								),
								'default_value'     => false,
								'allow_null'        => 0,
								'multiple'          => 0,
								'ui'                => 0,
								'return_format'     => 'value',
								'ajax'              => 0,
								'placeholder'       => '',
							),
							array(
								'key'               => 'field_socials_link',
								'label'             => 'Ссылка',
								'name'              => 'link',
								'type'              => 'url',
								'instructions'      => '',
								'required'          => 1,
								'conditional_logic' => 0,
								'default_value'     => '',
								'placeholder'       => '',
							),
						),
					),
					array(
						'key'               => 'field_contacts',
						'label'             => 'Основные',
						'name'              => 'contacts',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'layout'            => 'row',
						'sub_fields'        => self::acf_get_contact_fields()
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'site-contacts',
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

	public static function acf_get_contact_fields( $type = 'contacts' ) {
		return array(
			array(
				'key'               => 'field_' . $type . '_address',
				'label'             => 'Адреса',
				'name'              => 'address',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'collapsed'         => '',
				'min'               => 0,
				'max'               => 0,
				'layout'            => 'row',
				'button_label'      => '',
				'sub_fields'        => array(
					array(
						'key'               => 'field_' . $type . '_address_text',
						'label'             => 'Элемент',
						'name'              => 'item',
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
						'key'               => 'field_' . $type . '_address_link',
						'label'             => 'Ссылка',
						'name'              => 'link',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
				),
			),
			array(
				'key'               => 'field_' . $type . '_phone',
				'label'             => 'Телефоны',
				'name'              => 'phone',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'collapsed'         => '',
				'min'               => 0,
				'max'               => 0,
				'layout'            => 'row',
				'button_label'      => '',
				'sub_fields'        => array(
					array(
						'key'               => 'field_' . $type . '_phone_text',
						'label'             => 'Элемент',
						'name'              => 'item',
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
						'key'               => 'field_' . $type . '_phone_link',
						'label'             => 'Ссылка',
						'name'              => 'link',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
				),
			),
			array(
				'key'               => 'field_' . $type . '_mail',
				'label'             => 'E-mail\'ы',
				'name'              => 'mail',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'collapsed'         => '',
				'min'               => 0,
				'max'               => 0,
				'layout'            => 'row',
				'button_label'      => '',
				'sub_fields'        => array(
					array(
						'key'               => 'field_' . $type . '_mail_text',
						'label'             => 'Элемент',
						'name'              => 'item',
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
						'key'               => 'field_' . $type . '_mail_link',
						'label'             => 'Ссылка',
						'name'              => 'link',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					),
				),
			),
		);
	}
}