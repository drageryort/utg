<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<div id="team-popup" class="white-popup mfp-hide test">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="inner">
            <div class="part"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="part">
                <?php the_title( '<h4 class="title">', '</h3>' ); ?>
                <p class="description"><?php echo $fields['description']; ?></p>
                <?php echo do_shortcode( '[utg_contacts post_id="' . get_the_ID() . '" items="mail,phone" icons=1]' ); ?>

                <div class="info">
                    <p><?php _e( 'For renting premises and participating in this project, please contact:', 'utg'  ); ?></p>
                    <?php echo do_shortcode( '[utg_contacts post_id="' . get_the_ID() . '" items="address,phone" icons=1]' ); ?>
                </div>
            </div>
        </div>

    </article>
</div>