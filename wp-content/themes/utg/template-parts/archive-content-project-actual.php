<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<div class="item-actual">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="inner container">
            <div class="part">
                <div class="project-options">
                    <?php
                    if ( $fields['project_type'] == 'current' && ! empty( $fields['date'] ) ) {
                        echo '<div class="option date"><span class="label">' . __( 'Status:', 'utg' ) . ' </span><span class="value">' . $fields['date'] . '</span></div>';
                    }
                    the_title( '<a href="' . get_the_permalink( get_the_ID() ) . '"><h2 class="title">', '</h2></a>' );
                    if ( ! empty( $fields['address'] ) ) {
                        echo '<div class="option address"><span class="value">' . do_shortcode( '[icp_icon type="address"]' ) . $fields['address'] . '</span></div>';
                    }
                    if ( ! empty( $fields['rent_area'] ) ) {
                        echo '<div class="option area"><span class="label">' . __( 'GLA (Gross Leasable Area):', 'utg' ) . ' </span><span class="value">' . $fields['rent_area'] . ' ' . __( 'sq.m', 'utg' ) . '</span></div>';
                    }
                    if ( $fields['project_type'] == 'current' && ! empty( $fields['area'] ) ) {
                        echo '<div class="option area"><span class="label">' . __( 'GBA (Gross Building Area):', 'utg' ) . ' </span><span class="value">' . $fields['area'] . ' ' . __( 'sq.m', 'utg' ) . '</span></div>';
                    }
                    if ( $fields['project_type'] == 'fulfilled' && ! empty( $fields['dates'] ) ) {
                        echo '<div class="option dates"><span class="label">' . __( 'Participation:', 'utg' ) . ' </span><span class="value">' . $fields['dates'] . '</span></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="part project-gallery">
                <?php if ( ! empty( $fields['gallery'] ) ) { ?>
                    <div class="archive-actual-slider">
                        <?php array_map( function ( $item ) {
                            echo '<img src="' . $item['sizes']['large'] . '">';
                        }, $fields['gallery'] ); ?>
                    </div>
                    <div class="gallery-arrows"></div>
                <?php } else {
                    the_post_thumbnail( 'full' );
                } ?>
            </div>
        </div>
    </article>
</div>