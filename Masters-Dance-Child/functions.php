<?php
	/* Child Theme Styles */
	function theme_enqueue_styles() {
		wp_enqueue_style( 'kake-parent-stylesheet', get_template_directory_uri() . '/style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
	/* Child Theme Scripts */
	function theme_enqueue_scripts() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', '//code.jquery.com/jquery-2.2.4.min.js', false, null );
		wp_enqueue_script( 'sitejs', get_stylesheet_directory_uri() . '/assets/js/site.js', array( 'jquery' ), null, true );
	}
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts', 100, 1 );

	/* Custom Fonts List */
	$font_list = array(
		/**	Add custom font files in /fonts/ directory thru FTP.
		 ** Add list here, e.g.: 'FONT_NAME_HERE' => 'FONT_NAME_HERE',
		 **/
		// Erase this line to add a list.
		'Neuzeit-Grotesk-Condensed' => 'neuzeit-grotesk-condensed',
		'Neuzeit-Grotesk' => 'neuzeit-grotesk',
		'Neuzeit-Grotesk-Extra-Conden' => 'neuzeit-grotesk-extra-conden',
	);

	/* Custom Post Types */
	/** Add custom post types in /includes/cpts/ directory thru FTP.
	 ** Add list here, e.g.: include_once('includes/cpts/POST_TYPE_NAME_HERE/POST_TYPE_NAME_HERE-cpt.php');
	 **/
	include_once( 'includes/cpts/entries/entries-cpt.php' );
	include_once( 'includes/cpts/characters/characters-cpt.php' );

	/* Remove Custom Post Types */
	function delete_post_type() {
		unregister_post_type( 'testimonials' );
		unregister_post_type( 'template' );
	}
	add_action( 'init', 'delete_post_type' );