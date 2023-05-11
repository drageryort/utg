<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<div class="item-list">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="inner">
            <div class="part project-options">
                <?php
                the_title( '<h2 class="title">', '</h2>' );

                echo '<div class="option type"><span class="label">' . __( 'Type', 'utg' ) . ' </span>';
                if ( ! empty( $fields['type'] ) ) {
                    echo '<span class="value">';
                    foreach ($fields['type'] as $field){
                        echo ($field . ' ');
                    }
                    echo '</span>';
                }
                echo '</div>';

                echo '<div class="option service"><span class="label">' . __( 'Type of work', 'utg' ) . ' </span>';
                if ( ! empty( $fields['service'] ) ) {
                    echo '<span class="value">' . $fields['service'] . '</span>';
                }
                echo '</div>';

                echo '<div class="option area"><span class="label">' . __( 'GLA', 'utg' ) . ' </span>';
                if ( ! empty( $fields['rent_area'] ) ) {
                    echo '<span class="value">' . $fields['rent_area'] . '</span>';
                }
                echo '</div>';

                echo '<div class="option address"><span class="label">' . __( 'Address', 'utg' ) . ' </span>';
                if ( ! empty( $fields['address'] ) ) {
                    echo '<span class="value">' . $fields['address'] . '</span>';
                }
                echo '</div>';

                echo '<div class="option date"><span class="label">' . __( 'Year', 'utg' ) . ' </span>';
                if ( ! empty( $fields['developed_year'] ) ) {
                    echo '<span class="value">' . $fields['developed_year'] . '</span>';
                }
                echo '</div>';

                ?>
            </div>
        </div>
    </article>
</div>
