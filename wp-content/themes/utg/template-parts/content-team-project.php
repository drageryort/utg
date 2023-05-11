<?php $fields = function_exists( 'get_fields' ) ? get_fields( get_the_ID() ) : array(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="inner">
            <div class="part image">
                <?php echo get_the_post_thumbnail(); ?>
                <div class="mobile">
                    <a href="/team/">
                        <?php the_title( '<h4 class="title">', '</h3>' ); ?>
                    </a>
                    <p class="description"><?php echo $fields['description']; ?></p>
                </div>
            </div>
            <div class="part info">
                <a href="/team/" class="desktop">
                    <?php the_title( '<h4 class="title">', '</h3>' ); ?>
                </a>
                <p class="description desktop"><?php echo $fields['description']; ?></p>
                <?php echo do_shortcode( '[utg_contacts post_id="' . get_the_ID() . '" items="mail,phone" icons=1]' ); ?>

                <div class="info">
<!--                    Line removed under client ask. Response for string "По вопросам аренды"-->
<!--                    <p>--><?php //_e( 'For renting premises and participating in this project, please contact:', 'utg'  ); ?><!--</p>-->
<!--                    To get phone - add items="address, phone"-->
                    <?php echo do_shortcode( '[utg_contacts post_id="' . get_the_ID() . '" items="address" icons=1]' ); ?>
                </div>
            </div>
        </div>

    </article>
