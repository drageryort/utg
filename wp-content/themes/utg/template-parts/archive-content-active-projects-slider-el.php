<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<div class="item">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inner">
      <div class="part">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
      <div class="part project-options">
        <?php
        if ( ! empty( $fields['city'] ) ) {
          echo '<div class="option city"><span class="value">' . $fields['city'] . '</span></div>';
        }
        the_title( '<a href="' . get_the_permalink( get_the_ID() ) . '"><h2 class="title">', '</h2></a>' );

        if ( ! empty( $fields['area'] ) ) {
          echo '<div class="option area"><span class="label">' . __( 'Total Area sq.m:', 'utg' ) . ' </span><span class="value">' . $fields['area'] . '</span></div>';
        }
        if ( ! empty( $fields['rent_area'] ) ) {
          echo '<div class="option area"><span class="label">' . __( 'Rent Area sq.m:', 'utg' ) . ' </span><span class="value">' . $fields['rent_area'] . '</span></div>';
        }
        if ( ! empty( $fields['date'] ) ) {
          echo '<div class="option date"><span class="label">' . __( 'Status:', 'utg' ) . ' </span><span class="value">' . $fields['date'] . '</span></div>';
        }
        ?>
      </div>
    </div>
  </article>
</div>