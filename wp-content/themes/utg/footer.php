<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UTG
 */

?>

<footer id="colophon" class="site-footer">
    <div class="inner container">
        <div class="footer-top">
			<?php utg_logo( 'light' ); ?>
        </div>
        <div class="footer-center">
            <?php if ( is_active_sidebar( 'footer-right' ) ) {
                dynamic_sidebar( 'footer-right' );
            } ?>
        </div>
        <div class="footer-bottom"
            <div class="">
                <?php if ( is_active_sidebar( 'footer-left' ) ) {
                    dynamic_sidebar( 'footer-left' );
                } ?>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
