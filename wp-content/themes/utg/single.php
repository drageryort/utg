<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UTG
 */

    $post_type = get_post_type();
    if ($post_type != 'team' && $post_type != 'awards') {
        get_header();
    }
?>

    <main id="primary" class="site-main">
		<?php if ( ! in_array( get_post_type(), array( 'project' ) ) ) { ?>
        <div class="container pseudoAnimateLeft pseudoTransition">
			<?php } ?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<?php if ( ! in_array( get_post_type(), array( 'project' ) ) ) { ?>
        </div>
	<?php } ?>
    </main><!-- #main -->

<?php
    $post_type = get_post_type();
    if ($post_type != 'team' && $post_type != 'awards'){
        get_sidebar();
        get_footer();
    }
?>
