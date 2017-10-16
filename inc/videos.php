<?php


function kisimaVideoUploadPage()
{
	add_submenu_page('kisima-options', 'Video', 'Video', 'manage_options', 'kisima-options', 'themeCreatePage');
}

function videoCreatePage(){
	// Generate the admin page
	require_once get_template_directory() . '/inc/templates/admin-videos.php';
}
