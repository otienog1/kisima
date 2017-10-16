<?php
/**
 * Sidebar
 */

function sidebar_menus(){
	
}

function kisima_sidebar_avatar() {
	$input = '';
	$avatar = esc_attr(get_option('avatar'));

	$input .= '<input type="hidden" name="avatar" value="' . $avatar .'" id="avatar">';
	$input .= '<input type="button" value="Upload Avatar" id="kisima-upload-btn" class="button button-secondary">';

	echo $input;
}

function kisima_sidebar_name() {
	$input = '';
	$firstName = esc_attr(get_option('first_name'));
	$lastName = esc_attr(get_option('last_name'));

	$input .= '<input type="text" name="first_name" value="' . $firstName .'" placeholder="First Name" class="regular-text">';
	$input .= '<input type="text" name="last_name" value="' . $lastName .'" placeholder="Last Name" class="regular-text">';

	echo $input;
}

function kisima_sidebar_twitter() {
	$input = '';
	$twitter = esc_attr(get_option('twitter_handler'));
	$input .= '<input type="text" name="twitter_handler" value="' . $twitter .'" placeholder="Twitter handler" class="regular-text">';
	$input .= '<p class="description">Enter your twitter handler without the "@" character.</p>';

	echo $input;
}

function kisima_sidebar_fb() {
	$input = '';
	$fb = esc_attr(get_option('fb_handler'));
	$input .= '<input type="text" name="fb_handler" value="' . $fb .'" placeholder="Facebook handler" class="regular-text">';

	echo $input;
}

function kisima_sidebar_gplus() {
	$input = '';
	$gplus = esc_attr(get_option('gplus_handler'));
	$input .= '<input type="text" name="gplus_handler" value="' . $gplus .'" placeholder="Google+ handler" class="regular-text">';

	echo $input;
}

/**
 * Sinitize inputs
 */

function kisima_sanitize_twitter_handler($input) {
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}