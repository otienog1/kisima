<?php

/**
 * Custom Post Types
 */

$contact = get_option('contact_form');
if( @$contact == true ){

	add_action('init', function(){
		$labels = [
			'name' => 'Messages',
			'singular_name' => 'Message',
			'menu_name' => 'Messages',
			'name_admin_bar' => 'Message'
		];

		$args = [
			'labels' => $labels,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 26,
			'menu_icon' => 'dashicons-email-alt',
			'supports' => ['title', 'editor', 'author']
		];

		register_post_type('kisima-contact', $args);
	});

	add_filter( 'manage_kisima-contact_posts_columns', function( $columns ){
		// unset($columns['cb']);
		$new_columns = [];
		$new_columns['title'] = 'Name';
		$new_columns['message'] = 'Message';
		$new_columns['email'] = 'Email';
		$new_columns['date'] = 'Date';
		return $new_columns;
	} );

	// add_action(str 'hook', 'callback', int priority, int args)

	add_action( 'manage_kisima-contact_posts_custom_column', function( $column, $post_id ){

		switch ( $column ) {
			case 'message':
				echo get_the_excerpt();
				break;

			case 'email':
				echo '<a href="mailto:' . get_post_meta($post_id, '_kisima_email_val_key', true) . '">' . get_post_meta($post_id, '_kisima_email_val_key', true) . '</a>';
				break;

		}
	}, 10, 2);

	add_action('add_meta_boxes', function(){
		// add_meta_box('id', 'title', 'callback', 'screen', 'context', 'priority', array args);
		add_meta_box('kisima-email', 'Email Address', 'kisimaEmailMetabox', 'kisima-contact', 'side');
	});

	add_action('save_post', 'kisimaSaveEmailData');
}

function kisimaEmailMetabox( $post ){
	// wp_nonce_field('action', 'name', 'referer', bool 'echo');
	wp_nonce_field('kisimaSaveEmailData', 'kisima_email_metabox_nonce');
	// get_post_meta('post_id','key' bool $single);
	$val = get_post_meta($post->ID, '_kisima_email_val_key', true);

	$input = '<label for="kisima_contact_email_field">Email: </label>';
	$input .= '<input type="email" id="kisima_contact_email_field" name="kisima_contact_email_field" value="' . esc_attr( $val ) . '" />';
	echo $input;
}

function kisimaSaveEmailData( $post_id ){
	
	if (!isset($_POST['kisima_email_metabox_nonce'])) {
		return;
	}

	if (!wp_verify_nonce($_POST['kisima_email_metabox_nonce'], 'kisimaSaveEmailData')) {
		return;
	}

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}

	if ( !current_user_can('edit_post', $post_id) ){
		return;
	}

	if ( !isset($_POST['kisima_contact_email_field']) ) {
		return;
	}

	$data = sanitize_text_field( $_POST['kisima_contact_email_field'] );

	// update_post_meta(int psot_id, 'meta_key', 'meta_value', prev_value);
	update_post_meta($post_id, '_kisima_email_val_key', $data);
}