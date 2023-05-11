<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package UTG
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="container">
            <div class="image">
                <img src="/wp-content/themes/utg/assets/images/error-image.svg" alt="error-image">
            </div>
            <div class="content">
                <h1 class="title">
                    <?php _e( 'This page was not found, but you can visit other pages:', 'utg' ); ?>
                </h1>
                <div class="button-block">
                    <a href="/for-developers/" class="btn btn-fill"><?php _e( 'For developers', 'utg' ); ?></a>
                    <a href="/for-retailers/" class="btn btn-fill"><?php _e( 'For retailers', 'utg' ); ?></a>
                    <a href="/project-status/actual/" class="btn btn-fill"><?php _e( 'Actual', 'utg' ); ?></a>
                </div>
                <a href="#" class="btn btn-underline back-btn" onClick="event.preventDefault();history.back()">
                    <?php _e( 'Back', 'utg' ); ?>
                </a>
            </div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
