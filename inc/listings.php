<?php

	add_action('init', function(){
		$labels = [
			'name' => __( 'Listings' ),
			'singular_name' => __( 'Lising' ),
			'menu_name' => __( 'Listings' ),
			'name_admin_bar' => __( 'Listing' ),
		];

		$args = [
			'labels' => $labels,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-email',
			'public' => true,
			'has_archive' => true,
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'rewrite' => [
				'slug' => 'products',
				'with_front' => false,
			],
			'_eit_link' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'custom_fields', 'comments', 'revisions', /*'page-attributes',*/ 'post-formats'],
			'taxonomies' => ['category']
		];

		// add_submenu_page('Parent slug', 'page title', 'menu title', 'user level capability', 'menu-slug', 'callback');

		register_post_type('kisima-listing', $args);
	});