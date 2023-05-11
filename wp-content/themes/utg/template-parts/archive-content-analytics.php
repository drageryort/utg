<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>

<div class="news-page-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="news-photo">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
        <div class="news-info">
            <?php
                utg_posted_on();
                the_title( '<a href="' . get_the_permalink( get_the_ID() ) . '" class="news-title">
                    <h2 class="name">', '</h2>
                </a>' );

                echo '<p>' . get_the_title() . '</p>';
                if ( ! empty( $fields['analytic_resource'] ) ) {
                    echo '<p class="resource">
                            <span class="label">' . __( 'Source:', 'utg' ) . ' </span>
                            <span class="value">' . $fields['analytic_resource'] . ' </span>
                          </p>';
                }
            ?>

        </div>
    </article>
</div>