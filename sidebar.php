<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Kisima
 * @since Kisima 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar_packages' )  ) : ?>
	<div id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar_packages' ); ?>
	</div><!-- .sidebar .widget-area -->
<?php endif; ?>



<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .sidebar .widget-area -->
<?php endif; ?>
