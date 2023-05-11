<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

		<?php utg_post_thumbnail( 'large' ); ?>

        <div class="entry-meta">
			<?php utg_posted_on(); ?>
        </div>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header>

</article>
