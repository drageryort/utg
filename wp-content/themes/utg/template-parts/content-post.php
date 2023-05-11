<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
    <?php if ( function_exists( 'breadcrumbs' ) ) breadcrumbs(); ?>
    <div class="inner">

        <?php
        the_title( '<h2 class="name">', '</h2>' );
        utg_posted_on();

        ?>
        <?php
            if(! empty( $fields['post_video_link'])){
                echo '<div class="video-block">';
                echo '<iframe src="' .$fields['post_video_link'] . '" width="100%" height="100%">';
                echo 'Ваш браузер не поддерживает плавающие фреймы!';
                echo '</iframe>';
                echo '</div>';
            }
            else if(! empty( $fields['analytic_graphic'])){
                echo '<div class="photo-block"><img src="' . $fields['analytic_graphic'] . '" alt="graphic"></div>';
            }
            else{
                echo '<div class="photo-block">' .get_the_post_thumbnail() . '</div>';
            }
        ?>

        <?php
            if(get_the_content()){
                echo '<div class="content">';
                the_content();
                echo'</div>';
            }
        ?>
        <div class="description">
            <?php

                echo '<div class="left-col">';
                    if(! empty( $fields['analytic_resource'])){
                        echo '<p class="resource">
                                <span class="label">' . __( 'Source:', 'utg' ) . ' </span>
                                <span class="value">' . $fields['analytic_resource'] . ' </span>
                              </p>';
                    }
                    if(! empty( $fields['analytic_full_version_email'])){
                        echo '<p class="full-version-email">
                                <span class="label">' . __( 'To purchase the full version of the research, You can apply following e-mail:', 'utg' ) . ' </span>
                                <a href="mailto:'. $fields['analytic_full_version_email'] .'" class="value">' . $fields['analytic_full_version_email'] . ' </a>
                              </p>';
                    }
                echo '</div>';

                echo '<div class="right-col">';
                    if(! empty( $fields['analytic_demo_file'])){
                        echo '<p class="demo_file">
                                <span class="label">' . __( 'Download an introductory snippet:', 'utg' ) . ' </span>
                                <a class="value" download="true" href="' . $fields['analytic_demo_file'] . '">' . do_shortcode('[icp_icon type="download"]' ) . ' PDF</a>
                            </p>';
                    }
            ?>
        </div>

    </div>
</article>