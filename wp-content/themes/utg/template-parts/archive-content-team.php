<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>

<div class="team-page-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="team-inner">
            <div class="person-photo">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
            <div class="person-info">

                <?php
                    the_title( '<a href="' . get_the_permalink( get_the_ID() ) . '" class="open-team-post"><h2 class="name">', '</h2></a>' );
                    echo '<p class="description">' . $fields['description'] . '</p>';
                    echo do_shortcode('[utg_contacts post_id="' . get_the_ID() . '" items="mail,phone" icons=1]');
                ?>

            </div>
        </div>
    </article>
</div>