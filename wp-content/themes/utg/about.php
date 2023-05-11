<?php
/*
* Template name: About us
*/

get_header();
?>
<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="page-header-wrapper">
                <div class="page-header">
                    <?php
                    the_title('<h1>','</h1>')
                    ?>
                </div>
            </div>

            <div class="content-wrapper">

                <div class="feature-section">
                    <div class="feature-section-row top pseudoAnimateLeft pseudoTransition">
                        <!--                    loop-->
                        <?php
                        if( have_rows('about_us_main_features_list_top') ):
                            while( have_rows('about_us_main_features_list_top') ) : the_row();
                                $parent_title = get_sub_field('about_us_main_features_list_top');
                                echo '<p class="feature-section-el">
                                            <span class="value">'. get_sub_field('about_us_main_feature_value') .'</span>
                                            <span class="description">'. get_sub_field('about_us_main_feature_name') . '</span>
                                      </p>';
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="feature-section-row bottom">
                        <!--                    loop-->
                        <?php
                        if( have_rows('about_us_main_features_list_bottom') ):
                            while( have_rows('about_us_main_features_list_bottom') ) : the_row();
                                $parent_title = get_sub_field('about_us_main_features_list_bottom');
                                echo '<p class="feature-section-el">
                                            <span class="value">'. get_sub_field('about_us_main_feature_value') .'</span>
                                            <span class="description">'. get_sub_field('about_us_main_feature_name') . '</span>
                                      </p>';
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>

                <div class="text-field-section">
                    <?php if ( ! empty( $fields['about_us_main_text_top'] ) ) {
                        echo '<div class="top-left-col">' . $fields['about_us_main_text_top'] . '</div>';
                    }?>
                    <?php if ( ! empty( $fields['about_us_main_text_bottom'] ) ) {
                        echo '<div class="bottom-right-col pseudoAnimateRight pseudoTransition">' . $fields['about_us_main_text_bottom'] . '</div>';
                    }?>
                    <?php if ( ! empty( $fields['about_us_main_key_term'] ) ) {
                        echo '<div class="key-phrase">' . $fields['about_us_main_key_term'] . '</div>';
                    }?>
                </div>

                <div class="our-advantages-section pseudoAnimateLeft pseudoTransition">
                    <?php if ( ! empty( $fields['about_us_advantages_title'] ) ) {
                        echo '<h2 class="title">' . $fields['about_us_advantages_title'] . '</h2>';
                    }?>
                    <ul class="advantages-list">
<!--                        loop-->
                        <?php if( have_rows('about_us_advantages_list') ):
                            while( have_rows('about_us_advantages_list') ) : the_row();
                                $parent_title = get_sub_field('about_us_advantages_list');
                                echo
                                    '<li class="advantage-list-el">
                                        <span class="name">' . get_sub_field('about_us_advantages_list_title') . '</span>
                                        <span class="description">' . get_sub_field('about_us_advantages_list_description') . '</span>
                                    </li>';
                                endwhile;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="our-main-features">
                    <?php if ( ! empty( $fields['about_us_features_title'] ) ) {
                        echo '<h2 class="title">' . $fields['about_us_features_title'] . '</h2>';
                    }?>
                    <ul class="our-main-features-list">
<!--                        loop-->
                        <?php if( have_rows('about_us_features_list') ):
                            while( have_rows('about_us_features_list') ) : the_row();
                                $parent_title = get_sub_field('about_us_features_list');
                                echo
                                    '<li class="our-main-features-list-el">
                                        <div class="icon">
                                            <img src="'. get_sub_field('about_us_features_list_icon') .'" alt="icon">
                                        </div>
                                        <span class="name">' . get_sub_field('about_us_features_list_text') . '</span>
                                    </li>';
                            endwhile;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="our_peculiarity">
                    <?php if ( ! empty( $fields['about_us_our_peculiarity_title'] ) ) {
                        echo '<h2 class="title">' . $fields['about_us_our_peculiarity_title'] . '</h2>';
                    }?>
                    <ul class="our_peculiarities-list">
                        <!--                        loop-->
                        <?php if( have_rows('about_us_our_peculiarity_list') ):
                            while( have_rows('about_us_our_peculiarity_list') ) : the_row();
                                $parent_title = get_sub_field('about_us_our_peculiarity_list');
                                echo
                                    '<li class="our_peculiarities-list-el">
                                        <span class="description">' . get_sub_field('about_us_our_peculiarity_list_el') . '</span>
                                    </li>';
                            endwhile;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="main_clients">
                    <?php if ( ! empty( $fields['about_us_main_clients_title'] ) ) {
                        echo '<h2 class="title">' . $fields['about_us_main_clients_title'] . '</h2>';
                    }?>
                    <ul class="main_clients-list">
                        <!--                        loop-->
                        <?php if( have_rows('about_us_main_clients_list') ):
                            while( have_rows('about_us_main_clients_list') ) : the_row();
                                $parent_title = get_sub_field('about_us_main_clients_list');
                                echo
                                    '<li class="main_clients-list-el">
                                        <img class="logo" src="'. get_sub_field('about_us_main_clients_list_image') .'" alt="">
                                        <span class="name">'. get_sub_field('about_us_main_clients_list_name') .'</span>
                                    </li>';
                            endwhile;
                        endif;
                        ?>
                    </ul>
                </div>

                <?php if (  ! empty( $fields['about_us_expirience_slider_list'] ) ) {
                    ?>
                    <div class="brochures-slider-section">
                        <?php if ( ! empty( $fields['about_us_expirience_slider_title'] ) ) {
                            echo '<div class="title-wrapper pseudoAnimateLeft pseudoTransition">
                                        <h2 class="title">' . $fields['about_us_expirience_slider_title'] . '</h2>
                                        <div class="gallery-nav"></div>
                                  </div>';
                        } ?>
                        <?php if ( ! empty( $fields['about_us_expirience_slider_list'] ) ) { ?>
                            <div class="brochures-slider">
                                <!--                        loop-->
                                <?php if( have_rows('about_us_expirience_slider_list') ):
                                    while( have_rows('about_us_expirience_slider_list') ) : the_row();
                                        $parent_title = get_sub_field('about_us_expirience_slider_list');
                                        echo
                                            '<div class="brochures-slider-el">
                                                <img class="image" src="'. get_sub_field('about_us_expirience_slider_list_el_picture') .'" alt="">
                                                <span class="date">' . get_sub_field('about_us_expirience_slider_list_el_date') .'</span>
                                                <a class="link" target="_blank" href="'. get_sub_field('about_us_expirience_slider_list_el_link') .'">
                                                    <span class="name">'. get_sub_field('about_us_expirience_slider_list_el_title') .'</span>
                                                    ' . do_shortcode('[icp_icon type="download"]' ) .'
                                                </a>
                                            </div>';
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <div class="gallery-counter">
                                <span class="slide-current">1</span>
                                <span class="slides-counter"><?php echo count( $fields['about_us_expirience_slider_list'] ); ?></span>
                            </div>

                        <?php } else {
                            the_post_thumbnail( 'full' );
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

<?php
get_sidebar();
get_footer();
