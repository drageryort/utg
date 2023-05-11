<?php

add_shortcode( 'project_count', 'project_count' );

function project_count($params) {

    $params = shortcode_atts( array(
        'taxonomy' => array()
    ), $params );

    $out = '
                <div class="project-count-block">
                    <?php foreach ($params as $param){
                        $info_tax = get_term_by( "slug", $param, "project_status", $output = ARRAY_A);
                        $amount_param_link = get_term_link($param, "project_status"); 
                    ?>
                        <a href="<?php echo $amount_param_link; ?>" class="project-count-el btn btn-underline">
                            <span class="name"><?php echo $info_tax["name"]; ?></span>
                            <span class="amount"><?php echo $info_tax["count"]; ?>+</span>
                        </a>
                    }
                </div>
            ';
    return $out;



    if ( ! function_exists( 'get_field' ) ) {
        return '';
    }

    ob_start();

    $socials = get_field( 'socials', 'options' );

    if ( ! empty( $socials ) ) {
        echo '<div class="socials">';

        foreach ( $socials as $item ) {
            echo '<a href="' . $item['link'] . '" class="item" target="_blank">';
            echo '<span class="icon"><i class="fab fa-' . $item['type'] . '"></i></span>';
            echo '</a>';
        }

        echo '</div>';
    }

    return ob_get_clean();
}