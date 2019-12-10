<?php
    if ( ! function_exists( 'games_timeline_tax' ) ) {

        // Register Custom Taxonomy
        function games_timeline_tax() {

            $labels = array(
                'name'                       => _x( 'Games', 'Taxonomy General Name', 'games_timeline_tax' ),
                'singular_name'              => _x( 'Game', 'Taxonomy Singular Name', 'games_timeline_tax' ),
                'menu_name'                  => __( 'Games', 'games_timeline_tax' ),
                'all_items'                  => __( 'All Games', 'games_timeline_tax' ),
                'parent_item'                => __( 'Parent Game', 'games_timeline_tax' ),
                'parent_item_colon'          => __( 'Parent Game:', 'games_timeline_tax' ),
                'new_item_name'              => __( 'New Game Name', 'games_timeline_tax' ),
                'add_new_item'               => __( 'Add New Game', 'games_timeline_tax' ),
                'edit_item'                  => __( 'Edit Game', 'games_timeline_tax' ),
                'update_item'                => __( 'Update Game', 'games_timeline_tax' ),
                'view_item'                  => __( 'View Game', 'games_timeline_tax' ),
                'separate_items_with_commas' => __( 'Separate games with commas', 'games_timeline_tax' ),
                'add_or_remove_items'        => __( 'Add or remove games', 'games_timeline_tax' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'games_timeline_tax' ),
                'popular_items'              => __( 'Popular Games', 'games_timeline_tax' ),
                'search_items'               => __( 'Search Games', 'games_timeline_tax' ),
                'not_found'                  => __( 'Not Found', 'games_timeline_tax' ),
                'no_terms'                   => __( 'No games', 'games_timeline_tax' ),
                'items_list'                 => __( 'Games list', 'games_timeline_tax' ),
                'items_list_navigation'      => __( 'Games list navigation', 'games_timeline_tax' ),
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
            );
            register_taxonomy( 'games_timeline_tax', array( 'entries' ), $args );

        }
        add_action( 'init', 'games_timeline_tax', 0 );

    }