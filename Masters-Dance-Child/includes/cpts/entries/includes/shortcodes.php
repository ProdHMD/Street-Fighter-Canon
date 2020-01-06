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

            <div class="carousel-inner" id="entry-list-container">

                <?php
                    $args = array(
                        'post_type' => 'entry',
                        'nopaging' => true,
                        'posts_per_page' => -1,
                        'order' => $atts['order'],
                        'orderby' => $atts['orderby'],
                    );
                    $query = new WP_Query( $args );
                    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();

                    // Variables
                    global $post;
                ?>

                    <div class="entry carousel-item" id="<?php echo $post->slug; ?>">
                        <?php the_content(); ?>
                    <!-- end .carousel-item --></div>

                <?php endwhile; wp_reset_postdata(); else : ?>
                    <div class="carousel-item">
                        <p><?php esc_html_e( 'Data empty. No timeline entries were found.' ); ?></p>
                    <!-- end .carousel-item --></div>
                <?php endif; ?>

            <!-- end #entry-list-container --></div>

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

            <?php
                $terms = get_terms(
                    array(
                        'taxonomy' => 'games_timeline_tax',
                        'hide_empty' => false,
                        'meta_key' => 'entry_canon_year',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                    )
                );
                if( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            ?>

                <?php foreach ( $terms as $term ) : ?>
                    <?php $term_meta = get_term_meta( $term->term_id ); ?>
                    <?php if( $term_meta['entry_conjecture'][0] === 'checked' ) : ?>
                        <div class="game conjecture hidden" id="<?php echo $term->slug; ?>">
                    <?php else : ?>
                        <div class="game" id="<?php echo $term->slug; ?>">
                    <?php endif; ?>
                        <img src="<?php echo $term_meta['entry_game_logo'][0]; ?>" class="img-fluid" />
                    <!-- end .game --></div>
                <?php endforeach; ?>

            <?php else : ?>
                <div class="game">
                    <p><?php esc_html_e( 'Data empty. No games were found.' ); ?></p>
                <!-- end #entry-list-container --></div>
            <?php endif; ?>

            <a href="#toggle-conjecture" class="conjecture-hidden button"><span class="button-text"><span class="conjecture-text">Show</span> Conjecture</span></a>

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

                <?php
                    $args = array(
                        'post_type' => 'entry',
                        'nopaging' => true,
                        'posts_per_page' => -1,
                        'order' => $atts['order'],
                        'orderby' => $atts['orderby'],
                    );
                    $i = 0;
                    $query = new WP_Query( $args );
                    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                ?>

                    <li data-target="#entry-carousel" data-slide-to="<?php echo $i++; ?>" class="indicator"></li>

                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p><?php esc_html_e( 'There are no indicators.' ); ?></p>
                <?php endif; ?>

            <!-- end .carousel-indicators --></ol>
                        
        <?php
        return ob_get_clean();

    }
    add_shortcode( 'timeline-scroll', 'timeline_scroll' );