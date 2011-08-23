<?php

namespace WordPress\Themes\Genesis\Enthusiast;

class Theme {

	private $genesis_engine = NULL; 

	function __construct() {
		$this->configure_theme();
		$this->start_genesis_framework();
	}

	function configure_theme() {
		$this->genesis_engine = TEMPLATEPATH . '/lib/init.php';
		add_custom_background();
		add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 80 ) );
		add_theme_support( 'genesis-footer-widgets', 3 );
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
