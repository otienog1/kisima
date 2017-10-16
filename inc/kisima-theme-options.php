<?php

function kisimaThemeOptions(){
	add_submenu_page('kisima-options', 'Kisima', 'Options', 'manage_options', 'kisima-options', 'themeCreatePage');
	add_action('admin_init', function(){

		// Post formats

		register_setting('kisima-setting-group', 'post_formats', function( $input ){
			return $input;
		});
		add_settings_field('kisima-post-formats', 'Post formats', 'kisimaActivatePostFormats', 'kisima-options', 'kisima-theme-support');
		
		// register_setting('option_group', 'option_name', 'sanitize_callback');
		register_setting('kisima-setting-group','twitter_handle');
		register_setting('kisima-setting-group','fb_handle');
		register_setting('kisima-setting-group','gplus_handle');
		
		// add_settings_section('id', 'title', 'callback', 'page');

		add_settings_section('kisima-theme-support', 'Theme Support', 'kisimaThemeSupport','kisima-options');
		register_setting('kisima-setting-group', 'custom_header');
		register_setting('kisima-setting-group', 'custom_background');
		add_settings_field('kisima-header', 'Custom header', 'kisimaActivateCustomHeader', 'kisima-options', 'kisima-theme-support');
		add_settings_field('kisima-background', 'Custom background', 'kisimaActivateCustomBackground', 'kisima-options', 'kisima-theme-support');

		//contact

		register_setting('kisima-setting-group', 'contact_form');
		add_settings_section('kisima-contacts-grp', 'Contact form', 'kisimaContact', 'kisima-options');
		add_settings_field('kisima-contact', 'Contact form', 'kisimaActivateContactForm', 'kisima-options', 'kisima-contacts-grp');
		add_settings_section('kisima-social-handles', 'Social Media Handles', 'kisimaSocialHandles','kisima-options');
		
		// add_settings_field('id', 'title', 'callback', 'page', 'section', 'args' )
		add_settings_field('kisima-twitter-handle', 'Twitter', 'kisimaTwitterHandle', 'kisima-options', 'kisima-social-handles', 'sanitizeTwitterHandler');
		add_settings_field('kisima-fb-handle', 'Facebook', 'kisimaFacebookHandle', 'kisima-options', 'kisima-social-handles');
		add_settings_field('kisima-gplus-handle', 'google+', 'kisimagplusHandle', 'kisima-options', 'kisima-social-handles');
	});
}

function themeCreatePage(){
	// Generate the admin page
	require_once get_template_directory() . '/inc/templates/kisima-admin.php';
}

function kisimaSocialHandles() {
	echo "Add your social media handles";
}

function kisimaTwitterHandle(){
	echo '<input type="text" name="twitter_handle" value="' . esc_attr(get_option('twitter_handle')) . '" placeholder="Twitter" class="regular-text" /><p>Enter your twitter handle without the "@" character</p>';
}

function kisimaFacebookHandle(){
	echo '<input type="text" name="fb_handle" value="' . esc_attr(get_option('fb_handle')) . '" placeholder="Facebook" class="regular-text" />';
}

function kisimagplusHandle(){
	echo '<input type="text" name="gplus_handle" value="' . esc_attr(get_option('gplus_handle')) . '" placeholder="Google+" class="regular-text" />';
}

function sanitizeTwitterHandler($input) {
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}

function kisimaThemeSupport(){
	echo "Activate or deactivate specific theme support options";
}

function kisimaActivateCustomHeader(){
	$option = get_option('custom_header');
	$checked = ( $option == true ? "checked" : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . '></label>';
}

function kisimaActivateCustomBackground(){
	$option = get_option('custom_background');
	$checked = ( $option == true ? "checked" : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . '></label>';
}

function kisimaContact(){
	$message = "<p>Activate or deactivate the in-built <strong>Contact Form</strong>. ";
	$message .= "Use the <code>[contact_form]</code> <strong>shortcode</strong> to activate the <strong>Contact Form</strong> inside a page or a post</p>";
	echo $message;
}

function kisimaActivateContactForm(){
	$option = get_option('contact_form');
	$checked = ( $option == true ? "checked" : '' );
	echo '<label><input type="checkbox" id="contact_form" name="contact_form" value="1" ' . $checked . '></label>';
}

function kisimaActivatePostFormats(){
	$options = get_option( 'post_formats' );
	$formats = ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'];
	$field = '';
	foreach ( $formats as $format ){
		$checked = ( isset( $options[$format] ) == true ? "checked" : '' );
		$field .= '<div><label><input type="checkbox" id="' . $format . '" name="post_formats[' . $format . ']" value="1" ' . $checked . ' /> ' . $format . '</label></div>';
	}

	echo $field;
}