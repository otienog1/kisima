<?php

/**
 * Custom Post Types
 */

add_action('init', function(){
	$labels = [
		'name' => 'Feedback',
		'singular_name' => 'Feedback',
		'menu_name' => 'Feedback',
		'name_admin_bar' => 'Feedback'
	];

	$args = [
		'labels' => $labels,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 27,
		'menu_icon' => 'dashicons-smiley',
		'supports' => ['title', 'editor', 'author']
	];

	register_post_type('kisima-feedback', $args);
});

	add_filter( 'manage_kisima-feedback_posts_columns', function( $columns ){
		// unset($columns['cb']);
		$new_columns = [];
		$new_columns['title'] = 'Name';
		$new_columns['feedback'] = 'Feedback';
		$new_columns['email'] = 'Email';
		$new_columns['date'] = 'Date';
		return $new_columns;
	} );

	// add_action(str 'hook', 'callback', int priority, int args)

	add_action( 'manage_kisima-feedback_posts_custom_column', function( $column, $post_id ){

		switch ( $column ) {
			case 'feedback':
				echo get_the_excerpt();
				break;

			case 'email':
				echo '<a href="mailto:' . get_post_meta($post_id, '_kisima_email_val_key', true) . '">' . get_post_meta($post_id, '_kisima_email_val_key', true) . '</a>';
				break;

		}
	}, 10, 2);

	add_action('add_meta_boxes', function(){
		// add_meta_box('id', 'title', 'callback', 'screen', 'context', 'priority', array $args);
		add_meta_box('kisima-email', 'Email Address', 'kisimaEmailMetabox', 'kisima-feedback', 'side');
	});

	add_action('save_post', 'kisimaSaveEmailData');