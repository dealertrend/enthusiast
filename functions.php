<?php

function genesis_failed_to_load() {
	echo '<div id="message" class="error"><p>Unable to locate the Genesis Framework!</p></div>';
}

/** Start the engine */
if( file_exists( TEMPLATEPATH . '/lib/init.php' ) ) { 
	require_once( TEMPLATEPATH . '/lib/init.php' );
} else {
	add_action( 'admin_notices' , 'genesis_failed_to_load' );
	return false;
}

/** Add support for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 80 ) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );
