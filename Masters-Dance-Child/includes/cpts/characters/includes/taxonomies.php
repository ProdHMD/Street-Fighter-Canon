<?php
    if ( ! function_exists( 'games_chara_tax' ) ) {

        // Register Custom Taxonomy
        function games_chara_tax() {

            $labels = array(
                'name'                       => _x( 'Games', 'Taxonomy General Name', 'games_chara_tax' ),
                'singular_name'              => _x( 'Game', 'Taxonomy Singular Name', 'games_chara_tax' ),
                'menu_name'                  => __( 'Games', 'games_chara_tax' ),
                'all_items'                  => __( 'All Games', 'games_chara_tax' ),
                'parent_item'                => __( 'Parent Game', 'games_chara_tax' ),
                'parent_item_colon'          => __( 'Parent Game:', 'games_chara_tax' ),
                'new_item_name'              => __( 'New Game Name', 'games_chara_tax' ),
                'add_new_item'               => __( 'Add New Game', 'games_chara_tax' ),
                'edit_item'                  => __( 'Edit Game', 'games_chara_tax' ),
                'update_item'                => __( 'Update Game', 'games_chara_tax' ),
                'view_item'                  => __( 'View Game', 'games_chara_tax' ),
                'separate_items_with_commas' => __( 'Separate games with commas', 'games_chara_tax' ),
                'add_or_remove_items'        => __( 'Add or remove games', 'games_chara_tax' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'games_chara_tax' ),
                'popular_items'              => __( 'Popular Games', 'games_chara_tax' ),
                'search_items'               => __( 'Search Games', 'games_chara_tax' ),
                'not_found'                  => __( 'Not Found', 'games_chara_tax' ),
                'no_terms'                   => __( 'No games', 'games_chara_tax' ),
                'items_list'                 => __( 'Games list', 'games_chara_tax' ),
                'items_list_navigation'      => __( 'Games list navigation', 'games_chara_tax' ),
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
            register_taxonomy( 'games_chara_tax', array( 'characters' ), $args );

        }
        add_action( 'init', 'games_chara_tax', 0 );

    }