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

            <div class="container-fluid" id="sort-container">
                <div class="row" id="sort-row">
                    <div class="col-lg-6 col-sm-12" id="sort-title">
                        <h2 class="title">Choose Your Fighter</h2>
                    <!-- end #sort-title --></div>
                    <div class="col-lg-6 col-sm-12" id="sort-section">
                        <ul class="list-unstyled" id="sort-inner">
                            <span class="list-title">Sort By</span>
                            <li class="sort-item"><button class="button" data-filter="canonDebut"><span class="button-text">Canon Debut</span></button></li>
                            <li class="sort-item"><button class="button" data-filter="realtimeDebut"><span class="button-text">Realtime Debut</span></button></li>
                            <li class="sort-item"><button class="button" data-filter="name"><span class="button-text">A-Z</span></button></li>
                    <!-- end #sort-section --></div>
                <!-- end #sort-row --></div>
            <!-- end #sort-container --></div>
                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'character-sort', 'sort_chara_shortcode' );

    // Add Shortcode
    function chara_list_shortcode( $atts ) {

        // Attributes
        $atts = shortcode_atts(
            array(
                'order' => 'ASC',
                'orderby' => 'menu_order',
            ),
            $atts,
            'character-list'
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

                        <div class="col-lg-2 col-md-3 col-sm-4 character-slot character-item" data-name="<?php echo $slug; ?>" data-canon-debut="<?php foreach( $canon_debut as $canon ) echo $canon->slug; ?>" data-realtime-debut="<?php foreach( $realtime_debut as $realtime ) echo $realtime->slug; ?>">
                            <div class="character-slot-inner" style="background: url(<?php echo $character_img; ?>);">
                                <a href="<?php the_permalink(); ?>" class="slot-link"></a>
                            <!-- end .character-slot-inner --></div>
                        <!-- end .character-slot --></div>

                    <?php endwhile; wp_reset_postdata(); else : ?>
                        <div class="col-lg-12" id="portfolio-well">
                            <p><?php esc_html_e( 'Data empty. No fighters were found.' ); ?></p>
                        <!-- end #portfolio-well --></div>
                    <?php endif; ?>

                <!-- end #list-row --></div>
            <!-- end #list-container --></div>
                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'character-list', 'chara_list_shortcode' );