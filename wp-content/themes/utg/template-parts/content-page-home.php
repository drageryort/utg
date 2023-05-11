<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="section-home section-top">
        <div class="section-content-top">
            <div class="inner container">
                <div class="title"><?php echo $fields['section_top']['title']; ?></div>
				<?php echo do_shortcode( '[utg_socials]' ); ?>
            </div>
        </div>
        <div class="section-content-bottom">
            <div class="inner container">
                <div class="part">
                    <img src="<?php echo $fields['section_top']['images'][1]['sizes']['large']; ?>">
                    <nav class="partners-navigation">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'menu-submenu',
								'menu_id'        => 'partners-menu',
							)
						); ?>
                    </nav>
                </div>
            </div>
        </div>
        <div class="section-bg"
             style="background-image: url('<?php echo $fields['section_top']['images'][0]['sizes']['large']; ?>')">
        </div>
    </section>

    <section class="section-home section-about">
        <div class="inner container">
            <div class="row">
                <div class="col">
                    <div class="title"><?php echo $fields['section_about']['title']; ?></div>
					<?php echo wpautop( $fields['section_about']['text'] ); ?>
                    <a href="<?php echo get_permalink( get_the_ID())?>about/"
                       class="btn btn-underline"><?php echo __( 'Read More', 'utg' ); ?></a>
                    <ul class="new-brochure-desktop">
                        <?php foreach ( $fields['section_about']['brochure'] as $brochure ) {
                            echo '<li class="brochure">';
                            echo '<a href="'. $brochure['brochure-file'] .  '" target="_blank">';
                            echo '<img class="brochure-image" src="'. $brochure['brochure-image'] .  '" alt="brochure-image">';
                            echo '<p class="brochure-description">';
                            echo '<span class="brochure-description-name">'. $brochure['brochure-name'] .  '</span>';
                            echo (do_shortcode('[icp_icon type="download"]'));
                            echo'</p>';
                            echo '</a>';
                            echo '</li>';
                        } ?>
                    </ul>
                </div>
                <div class="col">
                    <div class="counter-wrap spin-start">
						<?php foreach ( $fields['section_about']['items'] as $item ) {
							echo '<div class="item">';
							echo '<div class="number-wrap">';
							echo '<span class="number spincrement">' . $item['number'] . '</span>';
							echo '<span class="suffix">' . $item['suffix'] . '</span>';
							echo '</div>';
							echo '<div class="text">' . $item['text'] . '</div>';
							echo '</div>';
						} ?>
                    </div>
                </div>
                <ul class="col new-brochure-tab-mob">
                    <?php foreach ( $fields['section_about']['brochure'] as $brochure ) {
                        echo '<li class="brochure">';
                        echo '<a href="'. $brochure['brochure-file'] .  '" target="_blank">';
                        echo '<img class="brochure-image" src="'. $brochure['brochure-image'] .  '" alt="brochure-image">';
                        echo '<p class="brochure-description">';
                        echo '<span class="brochure-description-name">'. $brochure['brochure-name'] .  '</span>';
                        echo (do_shortcode('[icp_icon type="download"]'));
                        echo'</p>';
                        echo '</a>';
                        echo '</li>';
                    } ?>
                </ul>
            </div>
        </div>
    </section>

    <div class="section-home section-links">
        <div class="inner container">
            <div class="title"><?php echo $fields['section_links']['title']; ?></div>
            <div class="block-links">
				<?php foreach ( $fields['section_links']['items'] as $key => $item ) {
					if ( $key !== 0 && ( $key % 3 == 0 ) ) {
						echo '</div>';
						echo '<div class="block-links">';
					}
					echo '<div class="item">';
					echo '<a href="' . $item['link'] . '" class="inner">';
					echo '<span class="text">' . $item['text'] . '</span>';
					echo '</a>';
					echo '</div>';
				} ?>
            </div>
        </div>
    </div>

    <div class="section-home section-projects pseudoAnimateLeft pseudoTransition">
        <div class="inner">
            <div class="container">
                <div class="title"><?php _e( 'Actual offers', 'utg' ); ?></div>
            </div>

			<?php echo do_shortcode( '[utg_projects type="slider" terms="actual" taxonomy="project-status" post-type="project"]' ); ?>


<!--            --><?php //echo do_shortcode( '[utg_projects type="slider" terms="actual" taxonomy="project-status" post-type="project"]' ); ?>
        </div>
    </div>

    <div class="section-home section-analytics">
        <div class="inner container">
            <div class="title-wrap">
                <div class="title"><?php _e( 'Analytics', 'utg' ); ?></div>
                <a href="<?php echo site_url( '/category/analytics/' ); ?>"
                   class="btn btn-underline desktop"><?php _e( 'All materials', 'utg' ); ?></a>
            </div>
			<?php echo do_shortcode( '[utg_news category="analytics" post_limit=4]' ); ?>
            <a href="<?php echo site_url( '/category/analytics/' ); ?>"
               class="btn btn-underline mobile"><?php _e( 'All materials', 'utg' ); ?></a>
        </div>
    </div>

    <div class="section-home section-news pseudoAnimateRight pseudoTransition">
        <div class="inner container">
            <div class="title-wrap">
                <div class="title"><?php _e( 'News', 'utg' ); ?></div>
                <a href="<?php echo site_url( '/category/news/' ); ?>"
                   class="btn btn-underline desktop"><?php _e( 'All news', 'utg' ); ?></a>
            </div>
			<?php echo do_shortcode( '[utg_news category="news" post_limit=5 ]' ); ?>
            <a href="<?php echo site_url( '/category/news/' ); ?>"
               class="btn btn-underline mobile"><?php _e( 'All news', 'utg' ); ?></a>
        </div>
    </div>

    <div class="section-home section-cta">
        <div class="inner container">
            <div class="title"><?php _e( 'Still have questions? <br> Let us call you', 'utg' ); ?></div>
            <a href="#request-popup" class="btn btn-fill"><?php _e( 'make a request', 'utg' ); ?></a>
        </div>
    </div>

</article>