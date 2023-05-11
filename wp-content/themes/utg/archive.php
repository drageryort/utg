<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UTG
 */

get_header();
?>
    <main id="primary" class="site-main">
        <div class="container pseudoAnimateLeft pseudoTransition">

			<?php if ( have_posts() ) :
                $post_type = get_post_type();

                if($post_type !== 'team') {
                    $parent_cat = get_queried_object()->parent ? get_term(get_queried_object()->parent, 'category') : 0;
                    $cat_slug = get_queried_object()->slug;
                }

                echo '<section class="header-wrapper '. $post_type . ' pseudoAnimateLeft pseudoTransition">';
                    echo '<div class="page-header-archive">';

                        if($post_type !== 'team' && $parent_cat && $parent_cat -> slug == 'analytics'){
                            echo ('<h1 class="archive-title">'. __('Analytics', 'utg' ) . '</h1>');
                        }
                        else{
                            the_archive_title( '<h1 class="archive-title">', '</h1>' );
                        }

                        if($post_type !== 'team' && $parent_cat && $parent_cat -> slug == 'analytics'){
                            echo '<a href="#order_research" class="btn btn-fill">';?>
                                <?php _e('Order research', 'utg' );?>
                            <?php echo '</a>';
                        }

                    echo '</div>';

                    if ( $post_type == 'team' ) {
                        $terms = get_terms( [
                            'taxonomy'   => 'team_department',
                            'hide_empty' => false,
                        ] );
                        ?>
                        <?php
                        echo '<span class="mobile mobile-title">' .__('Department', 'utg' ) .'</span>';
                        echo '<span class="mobile mobile-tab-active"></span>';

                        if(!wp_is_mobile()){
                            echo '<ul class="department_filter">';
                            foreach ( $terms as $term ) {
                                echo '<li class="filter_el">';
                                echo '<span class="' . $term->taxonomy . '-' . $term->slug . '">' . $term->name . '</span>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                        else{
                            echo '<div class="select-wrapper"><select class="department_filter">';
                                foreach($terms as $key => $term) {
                                    if ($key === array_key_first($terms)){
                                        echo '<option selected class="' . $term->taxonomy . '-' . $term->slug . '">' . $term->name . '</option>';
                                    }else{
                                        echo '<option class="' . $term->taxonomy . '-' . $term->slug . '">' . $term->name . '</option>';
                                    }
                                }
                            echo '</select></div>';
                        }

                    }

                    if ( $post_type == 'project' ) {
                        $filter_type = is_tax( 'project-status' ) ? get_queried_object()->slug : '';
                        echo do_shortcode( '[utg_project_filter type="' . $filter_type . '"]' );
                    }

                    if ($post_type !== 'team' && $parent_cat && $parent_cat -> slug == 'analytics'){
                        $cat_data = get_categories(
                            array(
                                'taxonomy'     => 'category',
                                'type'         => 'post',
                                'child_of' => $parent_cat -> term_id,
                                'hide_empty' => 0
                            )
                        );
                        $cat_links = '';
                        echo '<div class="tab-selector">';
                            foreach ( $cat_data as $one_cat_data)
                            $cat_links .= sprintf( '<a class="category-'. $one_cat_data -> slug.'" href="%s">%s</a>', get_category_link( $one_cat_data->term_id ) , $one_cat_data->cat_name );
                            echo ($cat_links);
                            echo '</div>';
                    }
                echo '</section>';

				/* Start the Loop */
                echo '<div class="archive-' . get_post_type() . '">';

                    if($post_type == 'team'){
                        $args = array('posts_per_page' => -1, 'post_type' => 'team');
                        $query = new WP_Query( $args );
                        while( $query->have_posts()) : $query->the_post();
                            get_template_part( 'template-parts/archive-content', get_post_type() );
                        endwhile;
                    }
                    else {
                        while (have_posts()) :
                        the_post();
                            if($post_type == 'post' && file_exists( get_template_directory() . '/template-parts/archive-content-' . $cat_slug . '.php' ) ){
                                get_template_part( 'template-parts/archive-content', $cat_slug );
                            }
                            else if($post_type == 'post' && file_exists( get_template_directory() . '/template-parts/archive-content-' . $parent_cat -> slug . '.php' ) ){
                                get_template_part( 'template-parts/archive-content', $parent_cat -> slug );
                            }
                            else if ( file_exists( get_template_directory() . '/template-parts/archive-content-' . get_post_type() . '.php' ) ) {
                                get_template_part( 'template-parts/archive-content', get_post_type() );
                            } else {
                                get_template_part( 'template-parts/content', get_post_type() );
                            }
                        endwhile;
                    }
                echo '</div>';

                //Pagination
                if( $post_type != 'team' ) {
                    the_posts_pagination(array(
                        'prev_next' => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    ));
                }


                if( $post_type == 'project' ){
                    echo "<div class='project-count-block'>";
                        $amount_params=array('actual', 'developed');
                        foreach ($amount_params as $param){
                            $info_tax = get_term_by( 'slug', $param, 'project-status', $output = ARRAY_A);
                            $amount_param_link = get_term_link($param, 'project-status');
                            echo "<a href='{$amount_param_link}' class='project-count-el btn btn-underline'>";
                            echo "<span class='description'> {$info_tax['description']}</span>";
                            echo "<span class='amount'> {$info_tax['count']}+</span>";
                            echo "</a>";
                        }
                    echo "</div>";
                };
			else :

                echo '<section class="header-wrapper project">';
                    the_archive_title( '<h1 class="archive-title">', '</h1>' );
                    $filter_type = is_tax( 'project-status' ) ? get_queried_object()->slug : '';
                    echo do_shortcode( '[utg_project_filter type="' . $filter_type . '"]' );
                echo '</section>';

                echo '<div class="no-results not-found"><div class="page-content"><div class="not-found-wrapper">';
                echo '<p class="text-content">'. __( 'No projects found for your request :(', 'utg' ) . '</p>';
                echo do_shortcode( '[icp_icon type="not_found_image"]');
                echo '</div></div></div>';
			endif;?>
        </div>
    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
