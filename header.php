<?php
	do_action( 'genesis_doctype' );
	do_action( 'genesis_title' );
	do_action( 'genesis_meta' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php
	do_action( 'genesis_before' );
?>

<div id="wrap">

<?php
	do_action( 'genesis_before_header' );
	do_action( 'genesis_header' );
	do_action( 'genesis_after_header' );

	echo '<div id="inner">';
	genesis_structural_wrap( 'inner' );
?>
