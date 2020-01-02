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
            register_taxonomy( 'games_chara_tax', array( 'character' ), $args );

        }
        add_action( 'init', 'games_chara_tax', 0 );

    }

    if ( ! function_exists( 'canon_debut_tax' ) ) {

        // Register Custom Taxonomy
        function canon_debut_tax() {

            $labels = array(
                'name'                       => _x( 'Canon Debut', 'Taxonomy General Name', 'canon_debut_tax' ),
                'singular_name'              => _x( 'Canon Debut', 'Taxonomy Singular Name', 'canon_debut_tax' ),
                'menu_name'                  => __( 'Canon Debuts', 'canon_debut_tax' ),
                'all_items'                  => __( 'All Canon Debuts', 'canon_debut_tax' ),
                'parent_item'                => __( 'Parent Canon Debut', 'canon_debut_tax' ),
                'parent_item_colon'          => __( 'Parent Canon Debut:', 'canon_debut_tax' ),
                'new_item_name'              => __( 'New Canon Debut Name', 'canon_debut_tax' ),
                'add_new_item'               => __( 'Add New Canon Debut', 'canon_debut_tax' ),
                'edit_item'                  => __( 'Edit Canon Debut', 'canon_debut_tax' ),
                'update_item'                => __( 'Update Canon Debut', 'canon_debut_tax' ),
                'view_item'                  => __( 'View Canon Debut', 'canon_debut_tax' ),
                'separate_items_with_commas' => __( 'Separate canon debuts with commas', 'canon_debut_tax' ),
                'add_or_remove_items'        => __( 'Add or remove canon debuts', 'canon_debut_tax' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'canon_debut_tax' ),
                'popular_items'              => __( 'Popular Canon Debuts', 'canon_debut_tax' ),
                'search_items'               => __( 'Search Canon Debuts', 'canon_debut_tax' ),
                'not_found'                  => __( 'Not Found', 'canon_debut_tax' ),
                'no_terms'                   => __( 'No canon debuts', 'canon_debut_tax' ),
                'items_list'                 => __( 'Canon Debuts list', 'canon_debut_tax' ),
                'items_list_navigation'      => __( 'Canon Debuts list navigation', 'canon_debut_tax' ),
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
            register_taxonomy( 'canon_debut_tax', array( 'character' ), $args );

        }
        add_action( 'init', 'canon_debut_tax', 0 );

    }

    if ( ! function_exists( 'realtime_debut_tax' ) ) {

        // Register Custom Taxonomy
        function realtime_debut_tax() {

            $labels = array(
                'name'                       => _x( 'Realtime Debut', 'Taxonomy General Name', 'realtime_debut_tax' ),
                'singular_name'              => _x( 'Realtime Debut', 'Taxonomy Singular Name', 'realtime_debut_tax' ),
                'menu_name'                  => __( 'Realtime Debuts', 'realtime_debut_tax' ),
                'all_items'                  => __( 'All Realtime Debuts', 'realtime_debut_tax' ),
                'parent_item'                => __( 'Parent Realtime Debut', 'realtime_debut_tax' ),
                'parent_item_colon'          => __( 'Parent Realtime Debut:', 'realtime_debut_tax' ),
                'new_item_name'              => __( 'New Realtime Debut Name', 'realtime_debut_tax' ),
                'add_new_item'               => __( 'Add New Realtime Debut', 'realtime_debut_tax' ),
                'edit_item'                  => __( 'Edit Realtime Debut', 'realtime_debut_tax' ),
                'update_item'                => __( 'Update Realtime Debut', 'realtime_debut_tax' ),
                'view_item'                  => __( 'View Realtime Debut', 'realtime_debut_tax' ),
                'separate_items_with_commas' => __( 'Separate realtime debuts with commas', 'realtime_debut_tax' ),
                'add_or_remove_items'        => __( 'Add or remove realtime debuts', 'realtime_debut_tax' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'realtime_debut_tax' ),
                'popular_items'              => __( 'Popular Realtime Debuts', 'realtime_debut_tax' ),
                'search_items'               => __( 'Search Realtime Debuts', 'realtime_debut_tax' ),
                'not_found'                  => __( 'Not Found', 'realtime_debut_tax' ),
                'no_terms'                   => __( 'No realtime debuts', 'realtime_debut_tax' ),
                'items_list'                 => __( 'Realtime Debuts list', 'realtime_debut_tax' ),
                'items_list_navigation'      => __( 'Realtime Debuts list navigation', 'realtime_debut_tax' ),
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
            register_taxonomy( 'realtime_debut_tax', array( 'character' ), $args );

        }
        add_action( 'init', 'realtime_debut_tax', 0 );

    }