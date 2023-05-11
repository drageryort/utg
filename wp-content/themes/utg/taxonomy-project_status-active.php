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
        <div class="container">

			<?php if ( have_posts() ) :
				echo '<section class="header-wrapper"> ';
				    $post_type = get_post_type();

                    echo '<div class="page-header-archive">';
                    the_archive_description( '<h1 class="archive-title">', '</h1>' );
                    echo '</div>';

                    if (empty( $_GET['utg_filter'])){
                        echo '<div class="page-params">';
                            echo '<div class="tab-row">';
                                echo '<div class="param-el el1">';
                                    echo '<span>' . get_field( 'develop_concept', 'option' ) . '</span>';
                                    echo '<span>' . __('Concepts developed', 'utg' ) . '</span>';
                                echo '</div>';
                                echo '<div class="param-el el2">';
                                    echo '<span>' . get_field('develop_clients','option') . '</span>';
                                    echo '<span>' . __('Clients', 'utg' ) . '</span>';
                                echo '</div>';
                                echo '<div class="param-el el3">';
                                    echo '<span>' . get_field('develop_mall','option') . '</span>';
                                    echo '<span>' . __('Launched shopping centers', 'utg' ) . '</span>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="tab-row">';
                                echo '<div class="param-el el4">';
                                    echo '<span>' . get_field('develop_area','option') . '</span>';
                                    echo '<span>' . __('Executed works', 'utg' ) . '</span>';
                                echo '</div>';
                                echo '<div class="param-el el5">';
                                    echo '<span>' . get_field('develop_gla','option') . '</span>';
                                    echo '<span>' . __('Rented GLA', 'utg' ) . '</span>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }


                    if ( $post_type == 'project' ) {
                        $filter_type = is_tax( 'project_status' ) ? get_queried_object()->slug : '';
                        echo do_shortcode( '[utg_project_filter type="' . $filter_type . '"]' );
                    }
				echo '</section>';

				/* Start the Loop */
				echo '<div class="archive-' . get_post_type() . '">';

				    while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					if ( file_exists( get_template_directory() . '/template-parts/archive-content-' . get_post_type() . '-developed.php' ) ) {
						get_template_part( 'template-parts/archive-content', get_post_type() . '-developed' );
					} elseif ( file_exists( get_template_directory() . '/template-parts/archive-content-' . get_post_type() . '.php' ) ) {
						get_template_part( 'template-parts/archive-content', get_post_type() );
					} else {
						get_template_part( 'template-parts/content', get_post_type() );
					}

				endwhile;

				echo '</div>';

                the_posts_pagination(array(
                    'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                ));


                echo "<div class='project-count-block'>";
                    $amount_params=array('realized', 'actual');
                    foreach ($amount_params as $param){
                        $info_tax = get_term_by( 'slug', $param, 'project_status', $output = ARRAY_A);
                        $amount_param_link = get_term_link($param, 'project_status');
                        echo "<a href='{$amount_param_link}' class='project-count-el btn btn-underline'>";
                            echo "<span class='name'> {$info_tax['name']}</span>";
                            echo "<span class='amount'> {$info_tax['count']}+</span>";
                        echo "</a>";
                    }
                echo "</div>";

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

        </div>
    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
