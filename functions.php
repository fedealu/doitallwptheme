<?php 

	/**
	* Template funcion name
	*
	* Template function description
	*
	* @global Template function global definitions
	* @param Template function paramenters
	* @return Template funciton returns
	*/

	/**
	* Enqueue Scripts
	*
	* Determines which scripts should be loadead depending on the view to render and the user requests
	*/
	function enqueueScripts() {
		// wp_enqueue_script( 'name', get_template_directory_uri() . 'url-from-them-baseurl', array(), '', false);
	}

	/**
	* Enqueue Styles
	*
	* Determines which styles should be loadead depending on the view to render and the user requests
	*/
	function enqueueStyles() {
		/* Styles */
		wp_enqueue_style( 'style', get_stylesheet_uri() ); //Basic Style
	}

	/**
	* Enqueue Both
	*
	* Determines which styles and scripts should be loadead depending on the view to render and the user requests
	*/
	function enqueueBoth() {
		enqueueStyles();
		enqueueScripts();
	}
	add_action( 'wp_enqueue_scripts', 'enqueueBoth' ); //enqueuing needed scripts

	if ( ! function_exists( 'doitall_setup' ) ) :
		/* Theme supports */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' ); //Adds support for post thumbnails
		
	endif;

	/**
	* Sets up theme defaults and registers support for various WordPress features
	*
	*  @since DoItAll 1.0
	*/
	function doitall_setup() {	

		/* Register Nav Menus */
		register_nav_menus( array(
	  	'main' => __( 'Main Menu', 'doitall' ),
	  	'social' => __( 'Social Links Menu', 'doitall' ),
	  	'footer' => __( 'Footer Menu', 'doitall')
	  ) );

		/* Register Sidebars */
		register_sidebars( array(
			'main' => __('Main Sidebar', 'doitall')
		) );

		/* Load theme textomain */
		load_theme_textdomain( 'doitall'/*, get_template_directory() . '/languages'*/ );

		/* Theme supports */
		add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head.
		add_theme_support( 'title-tag' ); //Lets WP manage the title tags
		add_theme_support( 'post-thumbnails' ); //Adds support for post thumbnails

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		$customLogoDefaults = array(
        'height'      => 200,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $customLogoDefaults );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'doitall' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'doitall' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'doitall' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'main' => array(
				'name' => __( 'Main Menu', 'doitall' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			'footer' => array(
				'name' => __( 'Top Menu', 'doitall' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'doitall' ),
				'items' => array(
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

		/*		
		 * Filters Twenty Seventeen array of starter content.
		 *
		 * @since Twenty Seventeen 1.1
		 *
		 * @param array $starter_content Array of starter content.
		*/		 
		$starter_content = apply_filters( 'doitall_starter_content', $starter_content );

		add_theme_support( 'starter-content', $starter_content );
	}

	/* Main actions executed when theme is loaded */
	add_action( 'init', 'doitall_setup' );

	function doitall_customize_register( $dia_customize ) {

		// header_settings customizer
		// header_type
		$dia_customize->add_setting('header_type', array(
				'type' => 'theme_mod',
				'default' => 'hero',
  			'sanitize_callback' => 'sanitize_header_type',
		) );

		$dia_customize->add_control('header_type', array(
				'type' => 'select',
				'section' => 'header_settings',
				'choices' => array(
												'hero' => 'Hero',
												'normal' => 'Normal',
												'half' => 'Half'
											),
				'label' => __( 'Type', 'doitall' ),
				'description' => __( 'You can choose between a variety of header Types. Choose wisely my young padawan.', 'doitall' ),
		) );

		$dia_customize->add_section( 'header_settings', array(
		  'title' => __( 'Header Settings', 'doitall' ),
		  'priority' => 20,
		  'capability' => 'edit_theme_options'
		) );

		/*$dia_customize->add_panel( 'header_settings', array(
		  'title' => __( 'Header Settings' ),
		  'description' => $description, // Include html tags such as <p>.
		  'priority' => 160, // Mixed with top-level-section hierarchy.
		) );*/

	}
	add_action( 'customize_register', 'doitall_customize_register' );
	/**
 * SVG icons functions and filters.
 */
	require get_parent_theme_file_path( '/inc/doitall_icon-functions.php' );
?>