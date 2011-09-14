<?php
	$theme_url =  $Enthusiast->theme_information[ 'ThemeURL' ];
	get_header();
?>

	<div class="home-top-full-width enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Top Full Width Content Area' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-top-left enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Top Left' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-top-middle enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Top Middle' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-top-right enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Top Right' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-middle-full-width enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Middle Full Width Content Area' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-bottom-left enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Bottom Left' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-bottom-middle enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Bottom Middle' ) ): ?>
		<?php endif; ?>
	</div>
	<div class="home-bottom-right enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Bottom Right' ) ): ?>
		<?php endif; ?>
	</div>

<?php
	do_action( 'genesis_before_content_sidebar_wrap' );
?>

<div id="content-sidebar-wrap">
	<div class="home-content-area enthusiast-theme">
		<?php if( ! dynamic_sidebar( 'Home Content Area' ) ): ?>
			<?php do_action( 'genesis_before_content' ); ?>
			<div id="content" class="hfeed">
				<?php
					do_action( 'genesis_before_loop' );
					do_action( 'genesis_loop' );
					do_action( 'genesis_after_loop' );
				?>
			</div>
			<?php do_action( 'genesis_after_content' ); ?>
		<?php endif; ?>
	</div>
</div>

<?php
	do_action( 'genesis_after_content_sidebar_wrap' );
	get_footer();
?>
