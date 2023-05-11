<?php

class UtgPost {

	protected string $post_type = '';
	protected string $post_name = '';

	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_acf_fields' ) );
		add_filter( 'single_template', array( $this, 'single_template' ) );
		add_filter( 'archive_template', array( $this, 'archive_template' ) );
		add_filter( 'manage_' . $this->post_type . '_posts_columns', array( $this, 'admin_columns_name' ) );
		add_action( 'manage_' . $this->post_type . '_posts_custom_column', array( $this, 'admin_columns' ), 10, 2 );

		add_filter( 'post_class', array( $this, 'post_class' ), 10, 3 );
	}

	function post_class( $classes, $class, $post_id ) {
		if ( get_post_type( $post_id ) == $this->post_type ) {
			$classes[] = $this->post_type . '-item';
		}

		return $classes;
	}

	function register_post_types() {
	}

	function register_acf_fields() {
		if ( function_exists( '___acf_add_local_field_group' ) ) {
			$layouts = array(
				'layout_title' => array(
					'key'        => 'layout_title',
					'name'       => 'title',
					'label'      => 'Заголовок',
					'display'    => 'block',
					'sub_fields' => array(
						array(
							'key'   => 'field_title_content',
							'label' => 'Заголовок элемента',
							'name'  => 'content',
							'type'  => 'text',
						),
					),
				),
				'layout_text'  => array(
					'key'        => 'layout_text',
					'name'       => 'text',
					'label'      => 'Текст',
					'display'    => 'block',
					'sub_fields' => array(
						array(
							'key'     => 'field_text_content',
							'label'   => 'Текст элемента',
							'name'    => 'content',
							'type'    => 'wysiwyg',
							'tabs'    => 'all',
							'toolbar' => 'basic',
						),
					),
				),
				'layout_img'   => array(
					'key'        => 'layout_img',
					'name'       => 'img',
					'label'      => 'Картинка',
					'display'    => 'block',
					'sub_fields' => array(
						array(
							'key'           => 'field_img_content',
							'label'         => 'Картинка',
							'name'          => 'content',
							'type'          => 'image',
							'return_format' => 'id',
							'preview_size'  => 'thumbnail',
							'library'       => 'all',
						),
					),
				),
				'layout_video' => array(
					'key'        => 'layout_video',
					'name'       => 'video',
					'label'      => 'Видео',
					'display'    => 'block',
					'sub_fields' => array(
						array(
							'key'   => 'field_video_content',
							'label' => 'Ссылка на видео',
							'name'  => 'content',
							'type'  => 'url',
						),
					),
				),
			);

			$post_types = array( 'program' );

			foreach ( $post_types as $post_type ) {
				acf_add_local_field_group( array(
					'key'                   => 'group_full_content_' . $post_type,
					'title'                 => 'Контент',
					'fields'                => array(
						array(
							'key'          => 'field_full_content_' . $post_type,
							'label'        => '',
							'name'         => 'full_content',
							'type'         => 'flexible_content',
							'layouts'      => apply_filters( 'full_content_acf', $layouts, $post_type ),
							'button_label' => 'Добавить элемент',
						),
					),
					'location'              => array(
						array(
							array(
								'param'    => 'post_type',
								'operator' => '==',
								'value'    => $post_type,
							)
						)
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
	}

	function admin_columns_name( $columns ) {
		return $columns;
	}

	function admin_columns( $column, $post_id ) {
		return;
	}

	function single_template( $template ) {
		global $post;

		if ( ! empty( $post->post_type ) && $post->post_type == $this->post_type &&
		     file_exists( UTG_CORE_PLUGIN_PATH . 'templates/single-' . $this->post_type . '.php' ) ) {
			return UTG_CORE_PLUGIN_PATH . 'templates/single-' . $this->post_type . '.php';
		}

		return $template;
	}

	function archive_template( $template ) {
		global $post;

		if ( ! empty( $post->post_type ) && $post->post_type == $this->post_type &&
		     file_exists( UTG_CORE_PLUGIN_PATH . 'templates/archive-' . $this->post_type . '.php' ) ) {
			return UTG_CORE_PLUGIN_PATH . 'templates/archive-' . $this->post_type . '.php';
		}

		return $template;
	}

	function post_order_by_menu_order( $query ) {
		if ( ! is_admin() && $query->is_main_query() ) {
			$query->set( 'orderby', array(
				'menu_order' => 'ASC',
				'date'       => 'DESC'
			) );
		}
	}
}
