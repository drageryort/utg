<?php
/*
* Template name: Developer
*/

get_header();
?>
<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="circle-section">
                <?php if ( ! empty( $fields['developer_service_circle__title'] ) ) {
                    echo '<h2 class="title">' . $fields['developer_service_circle__title'] . '</h2>';
                }?>
                <div class="circle-block">
                    <img class="main-image" src="/wp-content/themes/utg/assets/images/developer-circle.png" alt="">
                    <p class="middle-text">UTG</p>

                    <!--                        loop-->
                    <?php if( have_rows('developer_service_circle_list') ):
                        while( have_rows('developer_service_circle_list') ) : the_row();
                            $parent_title = get_sub_field('developer_service_circle_list');
                            if(get_row_index() == 1){
                                echo '<div class="circle-el-tab tab-selector active">';
                            }else{
                                echo '<div class="circle-el-tab tab-selector">';
                            }
                            echo '<span class="name">
                                    '. get_sub_field('icon_text') .'
                                </span>
                                <div class="icon-wrapper-white">
                                    <span class="icon-wrapper-blue">
                                        <img class="icon" src="'. get_sub_field('icon') .'" alt="">
                                    </span>
                                </div>
                            </div>';
                        endwhile;
                    endif;
                    ?>


                </div>
                <div class="description-block-wrapper">
                    <!--                        loop-->
                    <?php if( have_rows('developer_service_circle_list') ):
                        while( have_rows('developer_service_circle_list') ) : the_row();
                            $parent_title = get_sub_field('developer_service_circle_list');
                            if(get_row_index() == 1){
                                if(wp_is_mobile()){
                                    echo '<div class="accordion-selector active">
                                            <div class="icon-wrapper-white">
                                                <span class="icon-wrapper-blue">
                                                    <img class="icon" src="'. get_sub_field('icon') .'" alt="">
                                                </span>
                                            </div>
                                            <h2>' . get_sub_field('icon_text') . '</h2>
                                          </div>';
                                }
                                echo '<div class="circle-description-block tab-content active accordion-content">' . get_sub_field('description') . '<a class="btn btn-underline" href="' . get_sub_field('link') . '">' . __( 'Detailed', 'utg'  ) . '</a></div>';
                            }
                            else{
                                if(wp_is_mobile()){
                                    echo '<div class="accordion-selector">
                                            <div class="icon-wrapper-white">
                                                <span class="icon-wrapper-blue">
                                                    <img class="icon" src="'. get_sub_field('icon') .'" alt="">
                                                </span>
                                            </div>
                                            <h2>' . get_sub_field('icon_text') . '</h2>
                                          </div>';
                                }
                                echo '<div class="circle-description-block tab-content accordion-content">' . get_sub_field('description') . '<a class="btn btn-underline" href="' . get_sub_field('link') . '">' . __( 'Detailed', 'utg'  ) . '</a></div>';
                            }
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="divider-section pseudoTransition pseudoAnimateDouble">
                <?php if ( ! empty( $fields['developer_service_divider_top'] ) ) {
                    echo '<p>' . $fields['developer_service_divider_top'] . '</p>';
                }?>
                <?php if ( ! empty( $fields['developer_service_divider_bottom'] ) ) {
                    echo '<p>' . $fields['developer_service_divider_bottom'] . '</p>';
                }?>
            </div>
            <div class="top-projects-section">
                <?php if ( ! empty( $fields['developer_service_best_case_title'] ) ) {
                    echo '<h2 class="title">' . $fields['developer_service_best_case_title'] . '</h2>';
                }?>
                <div class="top-project-list">
                    <!--                        loop-->
                    <?php if( have_rows('developer_service_best_case_list') ):
                        while( have_rows('developer_service_best_case_list') ) : the_row();
                            $parent_title = get_sub_field('developer_service_best_case_list');
                            echo '<div class="top-project-list-el">';
                                    if ( ! empty( get_sub_field('developer_service_best_case_list_image'))) {
                                        echo '<img src="' . get_sub_field('developer_service_best_case_list_image') . '" alt="project-image">';
                                    }
                                    if ( ! empty( get_sub_field('developer_service_best_case_list_city'))) {
                                        echo '<p class="city">' . get_sub_field('developer_service_best_case_list_city') . '</p>';
                                    }
                                    if ( ! empty( get_sub_field('developer_service_best_case_list_name'))) {
                                        echo '<h2>' . get_sub_field('developer_service_best_case_list_name') . '</h2>';
                                    }
                                    if ( ! empty( get_sub_field('developer_service_best_case_list_area'))) {
                                        echo '<p>' . get_sub_field('developer_service_best_case_list_area') . '</p>';
                                    }
                                    if ( ! empty( get_sub_field('developer_service_best_case_list_period'))) {
                                        echo '<p>' . get_sub_field('developer_service_best_case_list_period') . '</p>';
                                    }
                                    if ( ! empty( get_sub_field('developer_service_best_case_list_status'))) {
                                        echo '<p class="date">' . get_sub_field('developer_service_best_case_list_status') . '</p>';
                                    }
                             echo '</div>';
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="main_clients">
                <?php if ( ! empty( $fields['developer_service_key_clients'] ) ) {
                    echo '<h2 class="title">' . $fields['developer_service_key_clients'] . '</h2>';
                }?>
                <ul class="main_clients-list">
                    <!--                        loop-->
                    <?php if( have_rows('developer_service_main_clients_list') ):
                        while( have_rows('developer_service_main_clients_list') ) : the_row();
                            $parent_title = get_sub_field('developer_service_main_clients_list');
                            echo
                                '<li class="main_clients-list-el">
                                        <img class="logo" src="'. get_sub_field('developer_service_main_clients_list_image') .'" alt="">
                                        <span class="name">'. get_sub_field('developer_service_main_clients_list_name') .'</span>
                                    </li>';
                        endwhile;
                    endif;
                    ?>
                </ul>
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
