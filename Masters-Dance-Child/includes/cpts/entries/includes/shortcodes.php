<?php
    // Add Shortcode
    function timeline_entry_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(
            array(
                'category' => '',
                'order' => 'ASC',
                'orderby' => 'menu_order',
            ),
            $atts,
            'entries'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'entries', 'timeline_entry_shortcode' );

    // Add Shortcode
    function timeline_list_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(
            array(
                'category' => '',
                'order' => 'ASC',
                'orderby' => 'menu_order',
            ),
            $atts,
            'timeline'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'timeline', 'timeline_list_shortcode' );