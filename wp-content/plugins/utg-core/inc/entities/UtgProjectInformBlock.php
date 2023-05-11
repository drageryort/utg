<?php

class UtgProjectInformBlock extends UtgEntities {

    public function __construct() {
        parent::__construct();
        $this->post_type = 'project';
    }

    public static function get_features( $post_id = null ) {
        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }
        $fields = get_fields( $post_id );

        return array(
            array(
                'key'   => 'presentation_link',
                'value' => ! empty( $fields['presentation_link'] ) ? implode( ', ', $fields['presentation_link'] ) : null
            ),
            array(
                'key'   => 'about_project_link',
                'value' => ! empty( $fields['project_link'] ) ? $fields['project_link'] : null
            ),
        );
    }

}
