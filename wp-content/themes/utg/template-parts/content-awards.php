<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <button title="Close" type="button" class="close-btn-wrapper">
        <?php echo do_shortcode( '[icp_icon type="close"]' ); ?>
        <span title="Close" type="button" class="btn btn-default mfp-close"></span>
    </button>
    <div class="inner">
        <div class="part"><?php echo get_the_post_thumbnail(); ?></div>
        <div class="part">
            <?php
                if($fields['awards_date']){
                    echo '<span class="date_label">'. $fields['awards_date'] . '</span>';
                }
            ?>

            <?php the_title( '<h3 class="title">', '</h3>' ); ?>

            <?php
                if($fields['awards_description']){
                    echo $fields['awards_description'];
                }
            ?>

        </div>
    </div>
</article>