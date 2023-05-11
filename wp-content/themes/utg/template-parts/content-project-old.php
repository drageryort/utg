<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
<?php
    $cur_terms = get_the_terms( $post->ID, 'project_status' );
    function termFilter($el){
        if($el -> slug == 'actual'){
            return $el;
        }
    }
    $breadcrumb = array_filter($cur_terms, "termFilter")[0];
?>
<div class="single-project-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section-project section-main project-main">
            <div class="inner container">
                <div class="part">
                    <?php
                        if(!wp_is_mobile()){?>
                            <div class="breadcrumbs desktop">
                                <span itemprop="itemListElement">
                                    <?php
                                        echo '<a class="breadcrumbs__link" 
                                                 href="'. get_term_link( $breadcrumb->term_id, $breadcrumb->taxonomy ) .'"
                                                 itemprop="item"><span itemprop="name">'. $breadcrumb->name .'</span>
                                              </a>'
                                    ?>
                                </span>
                            </div>
                        <?php }
                    ?>
                    <div class="project-options">
						<?php
						if ( $fields['project_type'] == 'current' && ! empty( $fields['date'] ) ) {
							echo '<div class="option date"><span class="label">' . __( 'Status:', 'utg' ) . ' </span><span class="value">' . $fields['date'] . '</span></div>';
						}

						the_title( '<h1 class="title">', '</h1>' );

						if ( ! empty( $fields['address'] ) ) {
							echo '<div class="option address"><span class="value">' . do_shortcode( '[icp_icon type="address"]' ) . $fields['address'] . '</span></div>';
						}
						if ( ! empty( $fields['area'] ) ) {
							echo '<div class="option area"><span class="label">' . __( 'GLA (Gross Leasable Area):', 'utg' ) . ' </span><span class="value">' . $fields['area'] . ' ' . __( 'sq.m', 'utg' ) . '</span></div>';
						}
						if ( $fields['project_type'] == 'current' && ! empty( $fields['rent_area'] ) ) {
							echo '<div class="option area"><span class="label">' . __( 'GBA (Gross Building Area):', 'utg' ) . ' </span><span class="value">' . $fields['rent_area'] . ' ' . __( 'sq.m', 'utg' ) . '</span></div>';
						}
						if ( $fields['project_type'] == 'fulfilled' && ! empty( $fields['dates'] ) ) {
							echo '<div class="option dates"><span class="label">' . __( 'Participation:', 'utg' ) . ' </span><span class="value">' . $fields['dates'] . '</span></div>';
						}
						?>
                    </div>
                </div>
                <?php
                    if(wp_is_mobile()){?>
                        <div class="breadcrumbs">
                            <span itemprop="itemListElement">
                                <?php echo '<a class="breadcrumbs__link" 
                                             href="'. get_term_link( $breadcrumb->term_id, $breadcrumb->taxonomy ) .'"
                                             itemprop="item"><span itemprop="name">'. $breadcrumb->name .'</span>
                                          </a>'
                                ?>
                            </span>
                        </div>
                    <?php }
                ?>
                <div class="part project-gallery">
					<?php if ( ! empty( $fields['gallery'] ) ) { ?>
                        <div class="project-slider">
							<?php array_map( function ( $item ) {
								echo '<img src="' . $item['sizes']['large'] . '">';
							}, $fields['gallery'] ); ?>
                        </div>
                        <div class="gallery-nav">
                            <div class="gallery-counter">
                                <span class="slide-current">1</span>
                                <span class="slides-counter"><?php echo count( $fields['gallery'] ); ?></span>
                            </div>
                            <div class="gallery-arrows"></div>
                        </div>
					<?php } else {
						the_post_thumbnail( 'full' );
					} ?>
                </div>
            </div>
        </div>

		<?php $features = class_exists( 'UtgProject' ) ? UtgProject::get_features() : array(); ?>

        <?php if ( ! empty( $features ) ) { ?>
            <div class="section-project section-features">
                <div class="container">
                    <div class="project-features">
						<?php foreach ( $features as $feature ) {
							if ( ! empty( $feature['value'] ) ) {
								echo '<div class="feature ' . $feature['key'] . '">';
								echo '<span class="label">' . $feature['label'] . ' </span>';
								echo '<span class="value' . ( is_numeric( $feature['value'] ) ? ' number' : '' ) . '">' . $feature['value'] . '</span>';
								echo '</div>';
							}
						} ?>
                    </div>
                </div>
            </div>
		<?php } ?>

        <?php if (  ! empty( $fields['developer_name'] ) || ! empty( $fields['developer_logo'] ) ) {
            ?>
            <div class="section-project section-project-developer">
                <div class="container">
                    <div class="title"><?php _e( 'Project developer', 'utg' ); ?></div>
                    <div class="project-developer">
                        <div class="logo-block">
                            <div class="logo">
                                <?php if( get_field('developer_logo') ): ?>
                                    <img src="<?php the_field('developer_logo'); ?>" />
                                <?php endif; ?>
                                <?php if( get_field('developer_name') ): ?>
                                    <p>
                                        <?php the_field('developer_name'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="title-block">
                            <?php if( have_rows('renter_list') ): ?>
                                <div class="title">
                                    <?php _e( 'Anchor tenants', 'utg' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="list-block">
                            <?php if( have_rows('renter_list') ): ?>
                                <ul class="list">
                                    <?php while( have_rows('renter_list') ): the_row();?>
                                    <li>
                                        <?php the_sub_field('renter');?>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (  ! empty( $fields['schemes'] ) ) {
        ?>
            <div class="section-project section-project-scheme">
                <div class="container">
                    <div class="title"><?php _e( 'Planning schemes', 'utg' ); ?></div>
                    <?php if ( ! empty( $fields['schemes'] ) ) { ?>
                        <div class="schemes-slider">
                            <?php array_map( function ( $item ) {
                                echo '<img src="' . $item['sizes']['large'] . '">';
                            }, $fields['schemes'] ); ?>
                        </div>
                        <div class="scheme-nav">
                            <div class="gallery-counter">
                                <span class="slide-current">1</span>
                                <span class="slides-counter"><?php echo count( $fields['schemes'] ); ?></span>
                            </div>
                        </div>
                    <?php } else {
                        the_post_thumbnail( 'full' );
                    } ?>
                </div>
            </div>
        <?php } ?>

		<?php if ( ! empty( $fields['contact_person'] ) ) {
			$post = $fields['contact_person']; ?>
            <div class="section-project section-team pseudoAnimateLeft pseudoTransition">
                <div class="container">
                    <div class="title"><?php _e( 'Contacts', 'utg' ); ?></div>
					<?php
					setup_postdata( $post );
					get_template_part( 'template-parts/content', 'team-project' );
					wp_reset_postdata();
					?>
                </div>
            </div>
		<?php } ?>

        <?php if (  ! empty( $fields['presentation_link'] ) || ! empty( $fields['about_project_link'] ) ) {
             ?>
            <div class="section-project section-project-inform">
                <div class="container">
                    <div class="title"><?php _e( 'Project information', 'utg' ); ?></div>
                    <div class="content button-block">
                        <?php if (  ! empty( $fields['presentation_link'] ) ) {
                        ?>
                            <a href="<?php the_field('presentation_link'); ?>" class="btn btn-underline download">
                                <?php echo do_shortcode( '[icp_icon type="download"]' ); ?>
                                <span><?php _e( 'Presentation', 'utg' ); ?></span>
                            </a>
                        <?php } ?>
                        <?php if (  ! empty( $fields['about_project_link'] ) ) {
                        ?>
                            <a href="<?php the_field('about_project_link'); ?>" class="btn btn-underline download">
                                <?php echo do_shortcode( '[icp_icon type="download"]' ); ?>
                                <span><?php _e( 'About project', 'utg' ); ?></span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="section-home section-cta">
            <div class="inner container">
                <div class="title"><?php _e( 'Still have questions? <br> Let us call you', 'utg' ); ?></div>
                <a href="#request-popup" class="btn btn-fill"><?php _e( 'make a request', 'utg' ); ?></a>
            </div>
        </div>

        <div class="section-home section-projects pseudoAnimateLeft pseudoTransition">
            <div class="inner">
                <div class="container">
                    <div class="title"><?php _e( 'Actual offers', 'utg' ); ?></div>
                </div>
				<?php echo do_shortcode( '[utg_projects type="slider" terms="actual" taxonomy="project_status" post-type="project"]' ); ?>
            </div>
        </div>
    </article>
</div>