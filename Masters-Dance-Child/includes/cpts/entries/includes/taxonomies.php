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
            register_taxonomy( 'games_timeline_tax', array( 'entry' ), $args );

        }
        add_action( 'init', 'games_timeline_tax', 0 );

    }

    class Entry_Game_Meta {

        public function __construct() {
    
            if ( is_admin() ) {
    
                add_action( 'games_timeline_tax_add_form_fields',  array( $this, 'create_screen_fields'), 10, 1 );
                add_action( 'games_timeline_tax_edit_form_fields', array( $this, 'edit_screen_fields' ),  10, 2 );
    
                add_action( 'created_games_timeline_tax', array( $this, 'save_data' ), 10, 1 );
                add_action( 'edited_games_timeline_tax',  array( $this, 'save_data' ), 10, 1 );
    
            }
    
        }

        /**
         * Hooks into WordPress' admin_footer function.
         * Adds scripts for media uploader.
         */
        public function admin_footer() {
            
            ?><script>
                // https://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
                jQuery(document).ready(function($){
                    if ( typeof wp.media !== 'undefined' ) {
                        var _custom_media = true,
                        _orig_send_attachment = wp.media.editor.send.attachment;
                        $('.rational-metabox-media').click(function(e) {
                            var send_attachment_bkp = wp.media.editor.send.attachment;
                            var button = $(this);
                            var id = button.attr('id').replace('_button', '');
                            _custom_media = true;
                                wp.media.editor.send.attachment = function(props, attachment){
                                if ( _custom_media ) {
                                    $("#"+id).val(attachment.url);
                                } else {
                                    return _orig_send_attachment.apply( this, [props, attachment] );
                                };
                            }
                            wp.media.editor.open(button);
                            return false;
                        });
                        $('.add_media').on('click', function(){
                            _custom_media = false;
                        });
                    }
                });
            </script><?php

        }
    
        public function create_screen_fields( $taxonomy ) {
    
            // Set default values.
            $entry_game_logo = '';
            $entry_conjecture = '';
            $entry_canon_year = '';
    
            // Form fields.
            echo '<div class="form-field term-entry_game_logo-wrap">';
            echo '	<label for="entry_game_logo">' . __( 'Game Logo', 'entry_game_meta' ) . '</label>';
            echo '  <input class="regular-text" id="entry_game_logo" name="entry_game_logo" type="text" value="' . esc_attr( $entry_game_logo ) . '" style="width:77.5%;"> <input class="button rational-metabox-media" id="entry_game_logo_button" name="entry_game_logo_button" type="button" value="Upload" />';
            echo '</div>';
    
            echo '<div class="form-field term-entry_conjecture-wrap">';
            echo '	<label for="entry_conjecture">' . __( 'Conjecture?', 'entry_game_meta' ) . '</label>';
            echo '	<label>';
            echo '		<input type="checkbox" id="entry_conjecture" name="entry_conjecture" placeholder="' . esc_attr__( '', 'entry_game_meta' ) . '" value="1" ' . checked( $entry_conjecture, 'checked', false ) . '>' . __( '', 'entry_game_meta' );
            echo '	</label>';
            echo '</div>';

            echo '<div class="form-field term-entry_canon_year-wrap">';
            echo '	<label for="entry_canon_year">' . __( 'Canon Year', 'entry_game_meta' ) . '</label>';
            echo '	<input type="number" id="entry_canon_year" name="entry_canon_year" placeholder="' . esc_attr__( '', 'entry_game_meta' ) . '" value="' . esc_attr( $entry_canon_year ) . '">';
            echo '</div>';
    
        }
    
        public function edit_screen_fields( $term, $taxonomy ) {
    
            // Retrieve an existing value from the database.
            $entry_game_logo = get_term_meta( $term->term_id, 'entry_game_logo', true );
            $entry_conjecture = get_term_meta( $term->term_id, 'entry_conjecture', true );
            $entry_canon_year = get_term_meta( $term->term_id, 'entry_canon_year', true );
    
            // Set default values.
            if( empty( $entry_game_logo ) ) $entry_game_logo = '';
            if( empty( $entry_conjecture ) ) $entry_conjecture = '';
            if( empty( $entry_canon_year ) ) $entry_canon_year = '';
    
            // Form fields.
            echo '<tr class="form-field term-entry_game_logo-wrap">';
            echo '<th scope="row">';
            echo '	<label for="entry_game_logo">' . __( 'Game Logo', 'entry_game_meta' ) . '</label>';
            echo '</th>';
            echo '<td>';
            echo '  <input class="regular-text" id="entry_game_logo" name="entry_game_logo" type="text" value="' . esc_attr( $entry_game_logo ) . '" style="width:87.5%;"> <input class="button rational-metabox-media" id="entry_game_logo_button" name="entry_game_logo_button" type="button" value="Upload" />';
            echo '</td>';
            echo '</tr>';
    
            echo '<tr class="form-field term-entry_conjecture-wrap">';
            echo '<th scope="row">';
            echo '	<label for="entry_conjecture">' . __( 'Conjecture?', 'entry_game_meta' ) . '</label>';
            echo '</th>';
            echo '<td>';
            echo '	<label>';
            echo '		<input type="checkbox" id="entry_conjecture" name="entry_conjecture" placeholder="' . esc_attr__( '', 'entry_game_meta' ) . '" value="1" ' . checked( $entry_conjecture, 'checked', false ) . '>' . __( '', 'entry_game_meta' );
            echo '	</label>';
            echo '</td>';
            echo '</tr>';

            echo '<tr class="form-field term-entry_canon_year-wrap">';
            echo '<th scope="row">';
            echo '	<label for="entry_canon_year">' . __( 'Canon Year', 'entry_game_meta' ) . '</label>';
            echo '</th>';
            echo '<td>';
            echo '	<input type="number" id="entry_canon_year" name="entry_canon_year" placeholder="' . esc_attr__( '', 'entry_game_meta' ) . '" value="' . esc_attr( $entry_canon_year ) . '">';
            echo '</td>';
            echo '</tr>';
    
        }
    
        public function save_data( $term_id ) {
    
            // Sanitize user input.
            $entry_new_game_logo = isset( $_POST[ 'entry_game_logo' ] ) ? esc_url( $_POST[ 'entry_game_logo' ] ) : '';
            $entry_new_conjecture = isset( $_POST[ 'entry_conjecture' ] ) ? 'checked'  : '';
            $entry_new_canon_year = isset( $_POST[ 'entry_canon_year' ] ) ? floatval( $_POST[ 'entry_canon_year' ] ) : '';
    
            // Update the meta field in the database.
            update_term_meta( $term_id, 'entry_game_logo', $entry_new_game_logo );
            update_term_meta( $term_id, 'entry_conjecture', $entry_new_conjecture );
            update_term_meta( $term_id, 'entry_canon_year', $entry_new_canon_year );

        }
    
    }
    new Entry_Game_Meta;