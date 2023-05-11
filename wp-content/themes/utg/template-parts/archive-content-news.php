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
                    the_excerpt();
                    ?>
            </div>
    </article>
</div>