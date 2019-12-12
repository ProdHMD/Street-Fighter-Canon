<?php
    // Add Shortcode
    function sort_chara_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(
            array(
                'category' => '',
                'order' => 'ASC',
                'orderby' => 'menu_order',
            ),
            $atts,
            'character-sort'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'character-sort', 'sort_chara_shortcode' );

    // Add Shortcode
    function chara_list_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(
            array(
                'category' => '',
                'order' => 'ASC',
                'orderby' => 'menu_order',
            ),
            $atts,
            'character-list'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'character-list', 'chara_list_shortcode' );