<?php
    if ( ! function_exists('entry_cpt') ) {

        // Register Custom Post Type
        function entry_cpt() {

            $labels = array(
                'name'                  => _x( 'Entries', 'Post Type General Name', 'entry_cpt' ),
                'singular_name'         => _x( 'Entry', 'Post Type Singular Name', 'entry_cpt' ),
                'menu_name'             => __( 'Entries', 'entry_cpt' ),
                'name_admin_bar'        => __( 'Entry', 'entry_cpt' ),
                'archives'              => __( 'Entry Archives', 'entry_cpt' ),
                'attributes'            => __( 'Entry Attributes', 'entry_cpt' ),
                'parent_item_colon'     => __( 'Parent Entry:', 'entry_cpt' ),
                'all_items'             => __( 'All Entries', 'entry_cpt' ),
                'add_new_item'          => __( 'Add New Entry', 'entry_cpt' ),
                'add_new'               => __( 'Add New', 'entry_cpt' ),
                'new_item'              => __( 'New Entry', 'entry_cpt' ),
                'edit_item'             => __( 'Edit Entry', 'entry_cpt' ),
                'update_item'           => __( 'Update Entry', 'entry_cpt' ),
                'view_item'             => __( 'View Entry', 'entry_cpt' ),
                'view_items'            => __( 'View Entries', 'entry_cpt' ),
                'search_items'          => __( 'Search Entry', 'entry_cpt' ),
                'not_found'             => __( 'Not found', 'entry_cpt' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'entry_cpt' ),
                'featured_image'        => __( 'Featured Image', 'entry_cpt' ),
                'set_featured_image'    => __( 'Set featured image', 'entry_cpt' ),
                'remove_featured_image' => __( 'Remove featured image', 'entry_cpt' ),
                'use_featured_image'    => __( 'Use as featured image', 'entry_cpt' ),
                'insert_into_item'      => __( 'Insert into entry', 'entry_cpt' ),
                'uploaded_to_this_item' => __( 'Uploaded to this entry', 'entry_cpt' ),
                'items_list'            => __( 'Entries list', 'entry_cpt' ),
                'items_list_navigation' => __( 'Entries list navigation', 'entry_cpt' ),
                'filter_items_list'     => __( 'Filter entries list', 'entry_cpt' ),
            );
            $args = array(
                'label'                 => __( 'Entry', 'entry_cpt' ),
                'description'           => __( 'Entries that are downloadable on the site.', 'entry_cpt' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
                'taxonomies'            => array( 'games_timeline_tax' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-media-document',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => false,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'show_in_rest'          => true,
            );
            register_post_type( 'entry', $args );

        }
        add_action( 'init', 'entry_cpt', 0 );

    }