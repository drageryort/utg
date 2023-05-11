<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UTG
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php
            $post_type = get_post_type();
            if($post_type != 'team' && $post_type != 'awards'){
                echo '<a href="' . get_permalink() . '" class="">';
                    if($post_type == 'page'){
                        echo '<p class="info">' . __( 'Page', 'utg' ) . '</p>';
                    }
                    else {
                        echo '<p class="info">' . __( $post_type, 'utg' ) . '</p>';
                    }
                    echo '<h2 class="entry-title">' . get_the_title() . '</h2>';
                echo '</a>';
            }
            else if($post_type == 'team'){
                echo '<a href="/' . $post_type . '" class="">';
                echo '<p class="info">' . __( $post_type, 'utg' ) . '</p>';
                echo '<h2 class="entry-title">' . get_the_title() . '</h2>';
                echo '</a>';
            }
            else {
                echo '<a href="/istoriya-kompanii/#section-awards" class="">';
                echo '<p class="info">' . __( $post_type, 'utg' ) . '</p>';
                echo '<h2 class="entry-title">' . get_the_title() . '</h2>';
                echo '</a>';
            }
        ?>
</article><!-- #post-<?php the_ID(); ?> -->
