<?php
/*
* Template name: History
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
                <div class="history-scale-wrapper">
                    <?php
                    if( have_rows('history_scale') ):
                        while( have_rows('history_scale') ) : the_row();
                            $parent_title = get_sub_field('history_scale');
                            echo '<div class="history-scale-el">
                                    <div class="left-col pseudoAnimateBottom pseudoAnimateOpacity pseudoTransition" data-year="'. get_sub_field('year') .'">
                                         '. get_sub_field('title') . '
                                    </div>
                                    <div class="middle-col" data-short-year="' . substr(get_sub_field('year'), -2) .'">
                                        ' . get_sub_field('year') . '
                                    </div>
                                    <div class="right-col"></div>
                                </div>';
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="map-block">
            <?php if( get_field('history_cart_block_title') &&  get_field('history_cart_block_file')): ?>
                <div class="container">
                    <h2 class="block-title">
                        <?php the_field('history_cart_block_title'); ?>
                    </h2>
                </div>
                <div class="history-map">
                    <img src="<?php the_field('history_cart_block_file'); ?>" />
                </div>
            <?php endif; ?>
        </div>
        <div class="section-awards pseudoAnimateLeft pseudoTransition" id="section-awards">
            <div class="inner">
                <div class="container">
                    <div class="title">
                        <h2>
                            <?php _e( 'Awards and titles', 'utg' ); ?>
                        </h2>
                    </div>
                    <?php echo do_shortcode( '[utg_projects type="slider" post-type="awards" taxonomy="" terms=""]' ); ?>
                </div>
            </div>
        </div>

        <?php if (  ! empty( $fields['history_gallery'] ) ) {
            ?>
            <div class="gallery-section">
                <div class="container header-wrapper">
                    <div class="title"><?php _e( 'Gallery', 'utg' ); ?></div>
                    <?php if ( ! empty( $fields['history_gallery'] ) ) { ?>
                        <div class="gallery-nav"></div>
                    <?php } ?>
                </div>
                <?php if ( ! empty( $fields['history_gallery'] ) ) { ?>
                    <div class="gallery-slider">
                        <?php array_map( function ( $item ) {
                            echo '<img src="' . $item['sizes']['large'] . '">';
                        }, $fields['history_gallery'] ); ?>
                    </div>
                    <div class="container gallery-counter">
                        <span class="slide-current">1</span>
                        <span class="slides-counter"><?php echo count( $fields['history_gallery'] ); ?></span>
                    </div>

                <?php } else {
                    the_post_thumbnail( 'full' );
                } ?>
            </div>
        <?php } ?>

    </main>

<?php
get_sidebar();
get_footer();
