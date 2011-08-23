<?php

namespace WordPress\Themes\Genesis\Enthusiast;

class Theme {

	private $genesis_engine = NULL; 

	private $theme_information = array();

	function __construct() {
		$this->configure_theme();
		$this->start_genesis_framework();
	}

	function configure_theme() {
		$this->theme_information[ 'ThemePath' ] = dirname( __FILE__ );
		$this->theme_information[ 'ThemeURL' ] = get_bloginfo( 'stylesheet_directory' );
		$this->genesis_engine = TEMPLATEPATH . '/lib/init.php';
		$this->configure_theme_support();
		$this->setup_administration_area();
	}

	function configure_theme_support() {
		add_custom_background();
		add_theme_support( 'genesis-custom-header' , array( 'width' => 960 , 'height' => 100 , 'header_image' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/red.gif' ) );
		add_theme_support( 'genesis-footer-widgets' , 1 );
	}

	function setup_administration_area() {
		add_action( 'admin_menu' , array( &$this, 'add_menu_item' ) );
		$this->register_defaults();
	}

	function add_menu_item() {
		add_theme_page(
			'Enthusiast: Theme Options',
			'Theme Options',
			'edit_theme_options',
			'enthusiast-theme-options',
			array( &$this , 'options_page' )
		);
	}

	function options_page() {
		include( $this->theme_information[ 'ThemePath' ] . '/options.php' );
	}

	function register_defaults() {
		register_default_headers(
			array(
				'red' => array(
					'url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/red.gif',
					'thumbnail_url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/red.gif',
					'description' => __( 'Red', 'enthusiast' )
				),
				'blue' => array(
					'url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/blue.gif',
					'thumbnail_url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/blue.gif',
					'description' => __( 'Blue', 'enthusiast' )
				),
				'green' => array(
					'url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/green.gif',
					'thumbnail_url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/green.gif',
					'description' => __( 'Green', 'enthusiast' )
				),
				'orange' => array(
					'url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/orange.gif',
					'thumbnail_url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/orange.gif',
					'description' => __( 'Orange', 'enthusiast' )
				),
				'grey' => array(
					'url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/grey.gif',
					'thumbnail_url' => $this->theme_information[ 'ThemeURL' ] . '/img/headers/grey.gif',
					'description' => __( 'Grey', 'enthusiast' )
				)
			)
		);
	}

	function start_genesis_framework() {
		if( file_exists ( $this->genesis_engine ) ) {
			require_once( $this->genesis_engine );
		} else {
			$this->failed_to_start();
		}
	}

	function failed_to_start() {
		add_action( 'admin_notices' , array( &$this , 'could_not_find_genesis' ) );
		add_action( 'init' , array( &$this, 'deactivate_theme' ) );
	}

	function deactivate_theme() {
		switch_theme( WP_DEFAULT_THEME , WP_DEFAULT_THEME );
	}

	function could_not_find_genesis() {
		echo '<div id="message" class="error">';
		echo '<p>Unable to locate the Genesis Framework!</p>';
		echo '<p id="message" class="error">Deactivating Enthusiast.</p>';
		echo '</div>';
	}

}

global $Enthusiast;

$Enthusiast = new Theme();

?>
