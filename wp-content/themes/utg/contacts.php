<?php
/*
* Template name: Contacts
*/

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="page-header-wrapper pseudoAnimateLeft pseudoTransition">
                <div class="page-header">
                    <?php
                    the_title('<h1>','</h1>')
                    ?>
                    <p class="address">
                        <?php the_field('contacts_address');?>
                    </p>
                    <div class="phone-block">
                        <?php
                        if( have_rows('contacts_phone_list') ):
                            while( have_rows('contacts_phone_list') ) : the_row();
                                $parent_title = get_sub_field('contacts_phone_list');
                                echo  '<a class="phone" href="tel:'. get_sub_field('contact_phone') . '">' . do_shortcode( '[icp_icon type="phone"]') . get_sub_field('contact_phone') . '</a>';
                            endwhile;
                        endif;
                        if( have_rows('contacts_email_list') ):
                            while( have_rows('contacts_email_list') ) : the_row();
                                $parent_title = get_sub_field('contacts_email_list');
                                echo  '<a class="email" href="mailto:'. get_sub_field('contact_email') . '">' . do_shortcode( '[icp_icon type="mail"]') . get_sub_field('contact_email') . '</a>';
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="left-col">
                    <a href="<?php the_field('contacts_youtube') ?>" class="item" target="_blank" rel="noopener noreferrer">
                        <span class="icon">
                            <i class="fab fa-youtube"></i>
                        </span>
                        Youtube
                    </a>
                    <a href="<?php the_field('contacts_facebook') ?>" class="item" target="_blank" rel="noopener noreferrer">
                        <span class="icon">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                        Facebook
                    </a>
                </div>
                <div class="right-col">
                    <?php
                    if( have_rows('contacts_data_block') ):
                        while( have_rows('contacts_data_block') ) : the_row();
                            // Get parent value.
                            $parent_title = get_sub_field('contacts_data_block');
                            echo '<div class="contact-data-el">';
                            echo  '<p class="title">' . get_sub_field('contacts_data_direction') . ':</p>';
                            if (get_sub_field('contacts_data_person')){
                                echo  '<a href="/team/" class="contact-person">' . get_sub_field('contacts_data_person') . '</a>';
                            }
                            // Loop over sub repeater rows.
                            if( have_rows('contacts_data_emails') ):
                                while( have_rows('contacts_data_emails') ) : the_row();
                                    // Get sub value.
                                    echo '<a class="mail" href="mailto:' . get_sub_field('contacts_data_email') . '">'
                                        . do_shortcode( '[icp_icon type="mail"]' )
                                        . get_sub_field('contacts_data_email') .
                                        '</a>';
                                endwhile;
                            endif;
                            if( have_rows('contacts_data_phones') ):
                                while( have_rows('contacts_data_phones') ) : the_row();
                                    // Get sub value.
                                    echo '<a class="phone" href="tel:' . get_sub_field('contacts_data_phone') . '">'
                                        . do_shortcode( '[icp_icon type="phone"]' )
                                        . get_sub_field('contacts_data_phone') .
                                        '</a>';
                                endwhile;
                            endif;
                            echo '</div>';
                        endwhile;
                    endif;
                    ?>

                </div>
            </div>

        </div>
    </main>

<?php
get_sidebar();
get_footer();
