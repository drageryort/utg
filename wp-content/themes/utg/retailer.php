<?php
/*
* Template name: Retailer
*/

get_header();
?>

<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="cooperation-description-section">
                <?php if ( ! empty( $fields['retailer_service_cooperation_title'] ) ) {
                    echo '<h2 class="title">' . $fields['retailer_service_cooperation_title'] . '</h2>';
                }?>

                    <!--                        loop-->
                    <?php if( have_rows('retailer_service_cooperation_list') ):
                        while( have_rows('retailer_service_cooperation_list') ) : the_row();
                            $parent_title = get_sub_field('retailer_service_cooperation_list');
                            echo
                            '<div class="description-block-wrapper">
                                <div class="description-block">' . get_sub_field('description') . '</div>';?>
                                <?php if(get_sub_field('image')){
                                    echo '<div class="image"><img class="animateBlock pseudoTransition" src="'. get_sub_field('image') .'" alt=""></div>';
                                }
                            echo '</div>';
                        endwhile;
                    endif;
                    ?>


            </div>
        </div>
        <div class="section-home section-projects pseudoAnimateLeft pseudoTransition">
            <div class="inner">
                <div class="container">
                    <div class="title"><?php _e( 'Actual offers', 'utg' ); ?></div>
                </div>
                <?php echo do_shortcode( '[utg_projects type="slider" terms="actual" taxonomy="project-status" post-type="project"]' ); ?>
            </div>
        </div>
        <div class="container">
            <div class="top-projects-section">
                <?php if ( ! empty( $fields['retailer_service_best_case_title'] ) ) {
                    echo '<h2 class="title">' . $fields['retailer_service_best_case_title'] . '</h2>';
                }?>
                <div class="top-project-list">
                    <!--                        loop-->
                    <?php if( have_rows('retailer_service_best_case_list') ):
                        while( have_rows('retailer_service_best_case_list') ) : the_row();
                            $parent_title = get_sub_field('retailer_service_best_case_list');
                            echo '<div class="top-project-list-el">';
                            if ( ! empty( get_sub_field('project_image'))) {
                                echo '<img src="' . get_sub_field('project_image') . '" alt="project-image">';
                            }
                            if ( ! empty( get_sub_field('project_name'))) {
                                echo '<h2>' . get_sub_field('project_name') . '</h2>';
                            }
                            echo '</div>';
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="section-home section-cta">
                <div class="inner container">
                    <div class="title"><?php _e( 'Still have questions? <br> Let us call you', 'utg' ); ?></div>
                    <a href="#request-popup" class="btn btn-fill"><?php _e( 'make a request', 'utg' ); ?></a>
                </div>
            </div>
            <div class="contact-section">
                <?php if ( ! empty( $fields['contact_person'] ) ) {
                    $post = $fields['contact_person']; ?>
                    <div class="section-project section-team pseudoAnimateLeft pseudoTransition">
                        <div class="title">
                            <?php _e( 'Contacts', 'utg' ); ?>
                        </div>
                        <?php
                        setup_postdata( $post );
                        get_template_part( 'template-parts/content', 'team-project' );
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

<?php
get_sidebar();
get_footer();
