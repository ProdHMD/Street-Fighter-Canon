<?php
    if ( ! function_exists('character_cpt') ) {

        // Register Custom Post Type
        function character_cpt() {

            $labels = array(
                'name'                  => _x( 'Characters', 'Post Type General Name', 'character_cpt' ),
                'singular_name'         => _x( 'Character', 'Post Type Singular Name', 'character_cpt' ),
                'menu_name'             => __( 'Characters', 'character_cpt' ),
                'name_admin_bar'        => __( 'Character', 'character_cpt' ),
                'archives'              => __( 'Character Archives', 'character_cpt' ),
                'attributes'            => __( 'Character Attributes', 'character_cpt' ),
                'parent_item_colon'     => __( 'Parent Character:', 'character_cpt' ),
                'all_items'             => __( 'All Characters', 'character_cpt' ),
                'add_new_item'          => __( 'Add New Character', 'character_cpt' ),
                'add_new'               => __( 'Add New', 'character_cpt' ),
                'new_item'              => __( 'New Character', 'character_cpt' ),
                'edit_item'             => __( 'Edit Character', 'character_cpt' ),
                'update_item'           => __( 'Update Character', 'character_cpt' ),
                'view_item'             => __( 'View Character', 'character_cpt' ),
                'view_items'            => __( 'View Characters', 'character_cpt' ),
                'search_items'          => __( 'Search Character', 'character_cpt' ),
                'not_found'             => __( 'Not found', 'character_cpt' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'character_cpt' ),
                'featured_image'        => __( 'Featured Image', 'character_cpt' ),
                'set_featured_image'    => __( 'Set featured image', 'character_cpt' ),
                'remove_featured_image' => __( 'Remove featured image', 'character_cpt' ),
                'use_featured_image'    => __( 'Use as featured image', 'character_cpt' ),
                'insert_into_item'      => __( 'Insert into character', 'character_cpt' ),
                'uploaded_to_this_item' => __( 'Uploaded to this character', 'character_cpt' ),
                'items_list'            => __( 'Characters list', 'character_cpt' ),
                'items_list_navigation' => __( 'Characters list navigation', 'character_cpt' ),
                'filter_items_list'     => __( 'Filter characters list', 'character_cpt' ),
            );
            $args = array(
                'label'                 => __( 'Character', 'character_cpt' ),
                'description'           => __( 'Characters that are downloadable on the site.', 'character_cpt' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
                'taxonomies'            => array( 'character_category', 'post_tag', 'location' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-universal-access-alt',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => false,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'show_in_rest'          => true,
            );
            register_post_type( 'character', $args );

        }
        add_action( 'init', 'character_cpt', 0 );

    }