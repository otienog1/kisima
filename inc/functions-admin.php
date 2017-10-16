<?php
/**
 * @package Wordress
 * @subpackage Kisima
 * Admin Page
 */

require_once get_template_directory() . "/inc/kisima-theme-options.php";;
require_once get_template_directory() . "/inc/slider.php";;
require_once get_template_directory() . "/inc/videos.php";;

// $current_user = wp_get_current_user();

function addAdminPage(){
	// add_menu_page('Page Title', 'Menu_title', 'user level capability', 'menu-slug', 'callback', 'custom icon', 'position');
	add_menu_page('Kisima Theme Options', 'Kisima', 'manage_options', 'kisima-options', 'themeCreatePage', 'dashicons-admin-tools', '99');
	add_menu_page('Upload Videos', 'Videos', 'manage_options', 'kisima-video-upload', 'videoCreatePage', 'dashicons-format-video', '27');

	/**
	 * Generate sub menu page
	 *  add_submenu_page('Parent slug', 'page title', 'menu title', 'user level capability', 'menu-slug', 'callback');
	 */
	kisimaThemeOptions();

	kisimaVideoUploadPage();

	/**
	 * Register Custom Settings
	 */
}
add_action('admin_menu', 'addAdminPage');



// Setup
function kisimaSetup(){
	if ( get_option( 'custom_header' ) ){
		add_theme_support('custom-header');
	}

	if ( get_option( 'custom_background' ) ){
		add_theme_support('custom-background');
	}

	// Add Theme support

	add_theme_support('post-thumbnails');

	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ] );

	add_theme_support( 'customize-selective-refresh-widgets' );

	$options = get_option( 'post_formats' );
	// var_dump($options); die();
	$formats = ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'];
	$output = [];
	foreach ($formats as $format) {
		$output[] = ( @$options[$format] == true ? $format : '' );
	}
	if ( !empty( $options ) ){
		add_theme_support('post-formats', $output);
	}
	
	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
	
	add_image_size( 'homepage-thumb', 494, 320, ['center', 'center'] ); // Soft Crop Mode

	add_image_size( 'homepage-1-thumb', 862, 300, ['center', 'center'] ); // Soft Crop Mode

	add_image_size( 'homepage-2-thumb', 800, 566, ['center', 'center'] ); // Soft Crop Mode
	
	add_image_size( 'singlepost-thumb', 1920, 500,  ['center', 'center']); // Unlimited Height Mode
	
	set_post_thumbnail_size(1920, 350);
}

add_action( 'after_setup_theme', 'kisimaSetup' );

// Register and load the widget
function kisima_load_widget() {
	register_widget('Kisima_Helpyou_Widget');
	register_widget('Kisima_Packages_Widget');

    register_sidebar( [
		'name'          => __( 'Sidebar', 'kisima' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'kisima' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title display-7">',
		'after_title'   => '</h2>',
	] );

	register_sidebar( [
		'name'          => __( 'Packages', 'kisima' ),
		'id'            => 'sidebar_packages',
		'description'   => __( 'Add the packages widget here to appear in your sidebar.', 'kisima' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title display-7">',
		'after_title'   => '</h2>',
	] );

	register_sidebar( [
		'name'          => __( 'Footer', 'kisima' ),
		'id'            => 'footer_1',
		'description'   => __( 'Add widget here to appear in your Footer.', 'kisima' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title display-7">',
		'after_title'   => '</h2>',
	] );
}
add_action( 'widgets_init', 'kisima_load_widget' );