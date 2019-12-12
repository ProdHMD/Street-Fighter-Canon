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
            'entry-list'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'entry-list', 'timeline_entry_shortcode' );

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
            'game-list'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'game-list', 'timeline_list_shortcode' );

    // Add Shortcode
    function timeline_scroll( $atts ) {

        // Attributes
        $atts = shortcode_atts(
            array(
                'category' => '',
                'order' => 'ASC',
                'orderby' => 'menu_order',
            ),
            $atts,
            'timeline-scroll'
        );

        ob_start();
        ?>

                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'timeline-scroll', 'timeline_scroll' );