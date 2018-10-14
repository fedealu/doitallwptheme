<?php 

	function registerSidebars() {
		register_sidebar( array('name' => 'main-sidebar') );	
	}
	

	function registerMenus() {
	  register_nav_menu('main-menu', __( 'Main Menu' ));
	  register_nav_menu('footer-menu', __( 'Footer Menu' ));
	}

	function enqueueScripts() {

	}

	function essentials() {
		/* Styles */
		wp_enqueue_style( 'style', get_stylesheet_uri() ); //Basic Style

		/* Main actions */
		add_action( 'init', 'registerMenus' );
		add_action( 'init', 'registerSidebars' );
		add_action( 'wp_enqueue_scripts', 'enqueueScripts' ); //enqueuing scripts
	}

	add_action( 'init', 'essentials' );

?>