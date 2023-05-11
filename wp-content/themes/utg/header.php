<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UTG
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="yandex-verification" content="4863621d8be67458" />
	<meta name="google-site-verification" content="9nJEI9NnfJ-ypomdh988P3N5gf72lrfes3okdrW7T3Y" />
    <meta name="msvalidate.01" content="AE43F7AEFE7525AAD1A42290D759A50C" />
    <meta name='wmail-verification' content='dd8e4db7f20ce6002e4b3f5fa9a0d3e0' />
    
	<?php wp_head(); ?>

	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TPNZSFL');</script>
</head>

<body <?php body_class(); ?>>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPNZSFL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<?php wp_body_open(); ?>
<div id="page" class="site">
    <div class="menu-wrapper"></div>
    <div class="top-bar">
        <div class="inner container">
            <div class="part">
                <nav class="topbar-navigation">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu-submenu',
							'menu_id'        => 'partners-menu',
						)
					); ?>
                </nav>
            </div>
            <div class="part desktop">
				<?php echo do_shortcode( '[utg_contacts items="address,phone"]' ); ?>
            </div>
        </div>
    </div>
    <header id="masthead" class="site-header">
        <div class="inner container">
            <div class="part">
				<?php utg_logo(); ?>
				<?php if ( is_front_page() ) {
					$home_title = get_bloginfo( 'name' );
					$home_title .= ! empty( get_bloginfo( 'description', 'display' ) ) ? ' | ' . get_bloginfo( 'description', 'display' ) : '';
					echo '<div class="hidden">';
					echo '<h1 class="site-title">' . $home_title . '</h1>';
					echo '</div>';
				} ?>

                <nav id="site-navigation" class="main-navigation desktop">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu-header',
							'menu_id'        => 'primary-menu',
						)
					); ?>
                </nav>
            </div>

            <div class="part search_lang_wrapper">
                <div class="search-wrapper">
                    <?php get_search_form(); ?>
                    <div class="search-icon"><?php echo do_shortcode( '[icp_icon type="search"]' ); ?></div>
                    <div class="close-icon"><?php echo do_shortcode( '[icp_icon type="close"]' ); ?></div>
                </div>
                <div class="mobile mobile-menu-trigger">
                    <?php echo do_shortcode( '[icp_icon type="menu"]' ); ?>
                </div>
                <div class="language-selector desktop">
                    <div class="language-current">
                        <span class="lang">Рус</span>
                        <?php echo do_shortcode( '[icp_icon type="triangle-down"]' ); ?>
                    </div>
                   <?php qtranxf_generateLanguageSelectCode('text', 'language'); ?>
                   </div>
            </div>
            <div class="mobile mobile-menu">
                <div class="close-icon-black mobile-menu-trigger"><?php echo do_shortcode( '[icp_icon type="close-black"]' ); ?></div>
                <span class="menu-title">
                    <?php _e( 'Menu', 'utg'  ); ?>
                </span>
                <nav id="site-navigation" class="main-navigation">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-header',
                            'menu_id'        => 'primary-menu',
                        )
                    ); ?>
                </nav>
                <div class="language-selector">
                    <div class="language-current">
                        <span class="lang">Рус</span>
                    </div>
                  <?php qtranxf_generateLanguageSelectCode('text', 'language'); ?>
                </div>
            </div>
        </div>

    </header>
