<?php

/**
 * Enque Functions
 */

function kisima_load_admin_scripts($hook) {
	if ( $hook != 'toplevel_page_kisima-options') return;
	wp_register_style('kisima_admin', get_template_directory_uri() . '/css/kisima.admin.css', [], '1.0.0', 'all');
	wp_enqueue_style('kisima_admin');

	wp_enqueue_media();

	wp_register_script('kisima_admin_script', get_template_directory_uri() . '/js/kisima.admin.js', ['jquery'], '1.0.0', true);
	wp_enqueue_script('kisima_admin_script');
}
add_action('admin_enqueue_scripts', 'kisima_load_admin_scripts');