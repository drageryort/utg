<?php
/*
* Template name: Service page
*/

get_header();
?>
<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
    <main id="primary" class="site-main">
        <div class="container">
            <?php if ( function_exists( 'breadcrumbs' ) ) breadcrumbs(); ?>
            <div class="content-wrapper">
                <?php if( get_field('service_page_description_checkbox') ) {
                     echo '<div class="page-description-section">
                           <h2 class="title">' . $fields['service_page_description_title'] . '</h2>';

                     if ( ! empty( $fields['service_page_description_left_col'] ) ) {
                        echo '<div class="left column pseudoAnimateRightRight pseudoTransition">' .$fields['service_page_description_left_col'] . '</div>';
                     }
                     if ( ! empty( $fields['service_page_description_right_col'] ) ) {
                        echo '<div class="right column">' . $fields['service_page_description_right_col'] . '</div>';
                     }
                     echo '</div>';
                }?>

                <?php
                    if( get_field('service_features_checkbox') ) {
                        //loop
                        if (have_rows('service_features_top')):
                            echo '<div class="feature-section">
                                <div class="feature-section-row top">';
                            while (have_rows('service_features_top')) : the_row();
                                $parent_title = get_sub_field('service_features_top');
                                if(get_sub_field('value') && get_sub_field('label')){
                                    echo '<p class="feature-section-el">
                                        <span class="value">' . get_sub_field('value') . '</span>
                                        <span class="description">' . get_sub_field('label') . '</span>
                                  </p>';
                                }
                            endwhile;
                            echo '</div>';
                        endif;
                        //loop
                        if (have_rows('service_features_bottom')):
                            echo '<div class="feature-section-row bottom">';
                            while (have_rows('service_features_bottom')) : the_row();
                                $parent_title = get_sub_field('service_features_bottom');
                                if(get_sub_field('value') && get_sub_field('label')){
                                    echo '<p class="feature-section-el">
                                        <span class="value">' . get_sub_field('value') . '</span>
                                        <span class="description">' . get_sub_field('label') . '</span>
                                  </p>';
                                }
                            endwhile;
                            echo '</div>
                            </div>';
                        endif;

                    }
                ?>

                <?php if ( get_field('service_unique_advantages_checkbox')) {
                    echo '<div class="advantages-section">';
                        if (!empty($fields['service_unique_advantages_title'])) {
                            echo '<h2 class="title">' . $fields['service_unique_advantages_title'] . '</h2>';
                        }
                        echo '<ul class="our-main-features-list">';
                        //loop

                        if (have_rows('service_unique_advantages_list')):
                            while (have_rows('service_unique_advantages_list')) : the_row();
                                $parent_title = get_sub_field('service_unique_advantages_list');
                                echo
                                    '<li class="our-main-features-list-el">
                                            <div class="icon">
                                                <img src="' . get_sub_field('icon') . '" alt="icon">
                                            </div>
                                            <span class="name">' . get_sub_field('content') . '</span>
                                        </li>';
                            endwhile;
                        endif;
                    echo '</ul>
                    </div>';
                }?>

                <?php if (  get_field('service_tab_block_checkbox') ) {
                    echo '<div class="tab-section">';
                        if (!empty($fields['service_tab_block_title'])) {
                            echo '<h2 class="title">' . $fields['service_tab_block_title'] . '</h2>';
                        }
                        echo '<ul class="tab-selector-list">';
                            if (have_rows('service_tab_block_content')):
                                while (have_rows('service_tab_block_content')) : the_row();
                                    $parent_title = get_sub_field('service_tab_block_content');
                                    if (get_row_index() == 1) {
                                        echo
                                            '<li class="tab-selector-el tab-selector active">
                                                <span>' . get_sub_field('tab_selector') . '</span>
                                            </li>';
                                    } else {
                                        echo
                                            '<li class="tab-selector-el tab-selector">
                                                <span>' . get_sub_field('tab_selector') . '</span>
                                            </li>';
                                    }
                                endwhile;
                            endif;
                        echo '</ul>
                        <ul class="tab-content-list">';
                            //loop
                            if (have_rows('service_tab_block_content')):
                                while (have_rows('service_tab_block_content')) : the_row();
                                    $parent_title = get_sub_field('service_tab_block_content');
                                    if (get_row_index() == 1) {
                                        echo
                                            '<li class="tab-content-el tab-content active">
                                                <h3>' . get_sub_field('tab_content_title') . '</h3>
                                                ' . get_sub_field('tab_content') . '
                                            </li>';
                                    } else {
                                        echo
                                            '<li class="tab-content-el tab-content">
                                                <h3>' . get_sub_field('tab_content_title') . '</h3>
                                                ' . get_sub_field('tab_content') . '
                                            </li>';
                                    }
                                endwhile;
                            endif;
                        echo '</ul>
                    </div>';
                }?>

                <?php if ( get_field('service_three_col_checkbox') ) {
                    echo '<div class="three-col-section">';
                        if (!empty($fields['service_three_col_title'])) {
                            echo '<h2 class="title">' . $fields['service_three_col_title'] . '</h2>';
                        }
                            if (have_rows('service_three_col_list')):
                                while (have_rows('service_three_col_list')) : the_row();
                                    $parent_title = get_sub_field('service_three_col_list');
                                    echo
                                    '<div class="three-col-section-content">
                                        <h3 class="left-column">
                                            <span>' . get_sub_field('first_col_title') .'</span>
                                        </h3>
                                        <div class="middle-column">
                                            <h4 class="">' . get_sub_field('second_col_title') . ' </h4>'
                                            . get_sub_field('second_col_list') .
                                        '</div>
                                        <div class="right-column">
                                            <h4 class="">' . get_sub_field('third_col_title') . ' </h4>'
                                            . get_sub_field('third_col_list') .
                                        '</div>
                                    </div>';
                                endwhile;
                            endif;
                    echo '</div>';
                }?>

                <?php if ( get_field('service_protfolio_checkbox') ) {
                    echo '<div class="portfolio-section">
                            <div class="left-column">';
                                if (!empty($fields['service_protfolio_title'])) {
                                    echo '<h2 class="title">' . $fields['service_protfolio_title'] . '</h2>';
                                }
                            echo '</div>
                            <div class="right-column">';
                                if (!empty($fields['service_protfolio_link'])) {
                                    echo '<a target="_blank" class="btn btn-underline" href="'. $fields['service_protfolio_link'] .'">'
                                        . $fields['service_protfolio_link_text'] . '</a>';
                                }
                            echo '</div>
                         </div>';
                 }?>

                <?php if ( get_field('service_subservice_checkbox') ) {
                    echo '<div class="sub-services-list-section">';
                    if (!empty($fields['service_subservice_title'])) {
                        echo '<h2 class="title">' . $fields['service_subservice_title'] . '</h2>';
                    }
                    echo '<div class="three-col-section-content">';
                    if (have_rows('service_subservice_list')):
                        while (have_rows('service_subservice_list')) : the_row();
                            $parent_title = get_sub_field('service_subservice_list');
                                echo '<a class="btn" href="' . get_sub_field('subservice_page') . '">'
                                    .get_sub_field('subservice_name') .
                                '</a>';
                        endwhile;
                    endif;
                    echo '</div>
                    </div>';
                }?>

                <?php if ( get_field('service_image_block_checkbox') ) {
                    echo '<div class="service_block_with_image-section">';
                    if (!empty($fields['service_image_block_title'])) {
                        echo '<h2 class="title">' . $fields['service_image_block_title'] . '</h2>';
                    }
                    echo '<div class="three-col-section-content">';
                    if (have_rows('service_image_block_image_list')):
                        while (have_rows('service_image_block_image_list')) : the_row();
                            $parent_title = get_sub_field('service_image_block_image_list');
                            if(get_sub_field('image_type') == 'picture'){
                                echo '<img class="' . get_sub_field('image_type') . '" src="' .get_sub_field('service_image_block_image_el') . '" alt="image">';
                            }
                            else if (get_sub_field('image_type') == 'table'){
                                echo '<div class="table-wrapper"><img class="' . get_sub_field('image_type') . '" src="' .get_sub_field('service_image_block_image_el') . '" alt="image"></div>';
                            }
                        endwhile;
                    endif;
                    echo '</div>
                    </div>';
                }?>

                <?php if ( get_field('service_cta_checkbox') ) { ?>
                    <div class="section-home section-cta">
                        <div class="inner container">
                            <div class="title"><?php _e( 'Still have questions? <br> Let us call you', 'utg' ); ?></div>
                            <a href="#request-popup" class="btn btn-fill"><?php _e( 'make a request', 'utg' ); ?></a>
                        </div>
                    </div>
                <?php } ?>

                <?php if ( get_field('service_contacts_checkbox') ) { ?>
                    <div class="contact-section">
                        <?php if ( ! empty( $fields['service_contacts'] ) ) {
                            $post = $fields['service_contacts']; ?>
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
                <?php } ?>
            </div>
        </div>
    </main>

<?php
get_sidebar();
get_footer();
