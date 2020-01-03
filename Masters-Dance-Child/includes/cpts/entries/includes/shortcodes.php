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

            <div class="container-fluid" id="list-container">   
                <div class="row character-grid" id="list-row">
                    
                    <?php
                        $args = array(
                            'post_type' => 'character',
                            'nopaging' => true,
                            'posts_per_page' => -1,
                            'order' => $atts['order'],
                            'orderby' => $atts['orderby'],
                        );
                        $query = new WP_Query( $args );
                        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();

                        // Variables
                        global $post;
                        $attachment_id = get_post_thumbnail_id();
                        $character_img = wp_get_attachment_image_src( $attachment_id, 'full', false );
                        $slug = $post->post_name;
                        $canon_debut = get_the_terms( $post->ID, 'canon_debut_tax' );
                        $realtime_debut = get_the_terms( $post->ID, 'realtime_debut_tax' );
                    ?>

                        <div class="carousel-inner" id="entry-list-container">

                            <div class="carousel-item">

                            <!-- end .carousel-item --></div>

                        <!-- end .carousel-inner --></div>

                    <?php endwhile; wp_reset_postdata(); else : ?>
                        <div class="col-lg-12" id="portfolio-well">
                            <p><?php esc_html_e( 'Data empty. No timeline entries were found.' ); ?></p>
                        <!-- end #portfolio-well --></div>
                    <?php endif; ?>

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

            <div class="game-timeline-list">

                <div class="game" id="<?php ?>">

                <!-- end .game --></div>

            <!-- end .game-timeline-list --></div>

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

            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators"></li>

            <!-- end .carousel-indicators --></ol>
                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'timeline-scroll', 'timeline_scroll' );