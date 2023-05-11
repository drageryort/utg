<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package UTG
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">

            <header class="page-header pseudoAnimateLeft pseudoTransition">
                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search:% s', 'utg' ), '<span> «' . get_search_query() . '» </span>' );
                    ?>
                </h1>
                <p class="results-amount">

                    <!-- count results-->
                    <?php _e( 'Results:', 'utg' );
                    $allsearch = new WP_Query("s=$s&showposts=0");
                    echo $allsearch ->found_posts;
                    ?>

                </p>
                <h5 class="sub-title">
                    <?php _e( 'All results', 'utg' );?>
                </h5>
            </header><!-- .page-header -->


			<?php if ( have_posts() ) : ?>
                <div class="search-wrapper-page">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'search' );
                    endwhile;
                    echo '</div>';
                    the_posts_pagination(array(
                        'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    ));
                echo '</div>';
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>


    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
