<?php

	/*-------------------------------------------
		Theme Defaults
	-------------------------------------------*/

	// Notes...


	if ( ! function_exists( 'reakt_setup' ) ) :

		function reakt_setup() {


			/*	Title Tag
			-------------------------------------------*/

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */

			add_theme_support( 'title-tag' );


			/*	Register Nav Menu(s)
			-------------------------------------------*/

			// This theme uses wp_nav_menu() in one locations

			register_nav_menus( array(

				'primary' => __( 'Primary Menu', 'reakt' )

			) );


			/*	Switch Default Core Markup to HTML5
			-------------------------------------------*/

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */

			add_theme_support( 'html5', array(

				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',

			) );


			/*	Editor Styles
			-------------------------------------------*/

			/*
			 * This theme styles the visual editor to resemble the theme style,
			 * specifically font, colors, icons, and column width.
			 */

			add_editor_style( array( 'a/css/css/editor.css' ) );

		}

	endif;

	add_action( 'after_setup_theme', 'reakt_setup' );


	/*-------------------------------------------
		Register Widget Area(s)
	-------------------------------------------*/

	/**
	 * Registers a widget area.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
	 *
	 * @since Twenty Sixteen 1.0
	 */

	function reakt_widgets_init() {

		register_sidebar( array(

			'name'			=> __( 'Sidebar', 'reakt' ),
			'id'			=> 'sidebar-1',
			'description'	=> __( 'Add widgets here to appear in your sidebar.', 'reakt' ),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h2 class="widget-title">',
			'after_title'	=> '</h2>',

		) );

	}

	add_action( 'widgets_init', 'reakt_widgets_init' );


	/*-------------------------------------------
		Enqueue Styles and Scripts
	-------------------------------------------*/

	/**
	 * Enqueues scripts and styles.
	 *
	 * @since Twenty Sixteen 1.0
	 */

	function reakt_styles_and_scripts() {


		/*	Screen Stylesheet
		-------------------------------------------*/

		// Notes...

		wp_enqueue_style( 'reakt-screen', get_template_directory_uri() . '/a/css/screen.css', array(), '1.0', 'all' );


		/*	Print Stylesheet
		-------------------------------------------*/

		// Notes...

		wp_enqueue_style( 'reakt-print', get_template_directory_uri() . '/a/css/print.css', array(), '1.0', 'print' );


		/*	Scripts
		-------------------------------------------*/

		// Notes...


		wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', get_template_directory_uri() . '/a/js/jquery.js', array(), '1.12.4', true );

		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'reakt-scripts', get_template_directory_uri() . '/a/js/scripts.js', array( 'jquery' ), '1.0', true );

	}

	add_action( 'wp_enqueue_scripts', 'reakt_styles_and_scripts' );


	/*-------------------------------------------
		Custom Template Tags
	-------------------------------------------*/

	/**
	 * Custom template tags for this theme.
	 */

	require get_template_directory() . '/inc/template-tags.php';


	/*-------------------------------------------
		Deregister Features
	-------------------------------------------*/

	// Notes...


	function deregister_features() {

		/*	Title
		-------------------------------------------*/

		// Notes...


		wp_deregister_script( 'wp-embed' );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		remove_action( 'wp_print_styles', 'print_emoji_styles' );


		/*	Title
		-------------------------------------------*/

		// Notes...


		global $wp_widget_factory;

		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'wp_generator' );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'wlwmanifest_link' );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'rsd_link' );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );


		/*	Title
		-------------------------------------------*/

		// Notes...


		remove_action( 'wp_head', 'rel_canonical' );

	}

	add_action( 'init', 'deregister_features' );


	/*-------------------------------------------
		Contact Form 7
	-------------------------------------------*/


	// Disable initial loading of stylesheet and script.


	add_filter( 'wpcf7_load_css', '__return_false' );

	add_filter( 'wpcf7_load_js', '__return_false' );


	/*-------------------------------------------
		Add Support for SVG
	-------------------------------------------*/

	// Notes...


	function cc_mime_types($mimes) {

		$mimes['svg'] = 'image/svg+xml';

		return $mimes;

	}

	add_filter( 'upload_mimes', 'cc_mime_types' );


	/*-------------------------------------------
		Custom Password Protect Form
	-------------------------------------------*/

	// Notes...


	function custom_password_form() {

		global $post;

		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

		// $o = '<div class="form"><form class="private-work" action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass" method="post"><ul>' . __( "" ) . '<li><label for="' . $label . '">' . __( "Password" ) . ' </label><input name="post_password" id="' . $label . '" type="password" placeholder="Password" /></li></ul><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></form></div>';

		$o = '<div class="form"><form class="private-work" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><ul>' . __( "" ) . '<li><label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" placeholder="Password" /></li></ul><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></form></div>';

		return $o;

	}

	add_filter( 'the_password_form', 'custom_password_form' );






	/*-------------------------------------------
		Remove "Protected" from Project Title
	-------------------------------------------*/

	// Notes...


	add_filter( 'protected_title_format', 'remove_protected_text');

	function remove_protected_text() {

		return __( '%s' );

	}


	/*-------------------------------------------
		Globals
	-------------------------------------------*/

	// Notes...


	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_page( array(

			// 'page_title'	=> 'Theme General Settings',
			'menu_title'	=> 'Globals',
			'menu_slug'		=> 'globals'
			// 'capability'	=> 'edit_posts',
			// 'redirect'		=> false

		) );

		acf_add_options_sub_page( array(

			'page_title' 	=> 'Contact Information',
			'menu_title'	=> 'Contact Information',
			'parent_slug'	=> 'globals'

		) );

		acf_add_options_sub_page( array(

			'page_title' 	=> 'Social Media',
			'menu_title'	=> 'Social Media',
			'parent_slug'	=> 'globals'

		) );

	}