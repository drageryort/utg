<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <button title="Close" type="button" class="close-btn-wrapper">
        <?php echo do_shortcode( '[icp_icon type="close"]' ); ?>
        <span title="Close" type="button" class="btn btn-default mfp-close"></span>
    </button>
    <div class="inner">
        <div class="part"><?php echo get_the_post_thumbnail(); ?></div>
        <div class="part">
            <?php the_title( '<h3 class="title">', '</h3>' ); ?>
            <p class="description"><?php echo $fields['description']; ?></p>
            <?php echo do_shortcode( '[utg_contacts post_id="' . get_the_ID() . '" items="mail,phone" icons=1]' ); ?>

            <?php if (  ! empty( $fields['biography'] ) ) {
                ?>
                <div class="biography-wrapper">
                    <div class="biography"><?php echo $fields['biography']; ?></div>
                </div>
            <?php } ?>

        </div>
    </div>
</article>