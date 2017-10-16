<?php

add_action('wp_ajax_nopriv_kisima_save_contact', 'kisimaSaveContact');
add_action('wp_ajax_nopriv_kisima_save_contact', 'kisimaSaveFeedback');
add_action('wp_ajax_kisima_save_contact', 'kisimaSaveContact');
add_action('wp_ajax_kisima_save_feedback', 'kisimaSaveFeedback');
add_action('wp_ajax_nopriv_kisima_load_more', 'kisimaLoadMore');
add_action('wp_ajax_kisima_load_more', 'kisimaLoadMore');

function kisimaLoadMore(){
	$paged = $_POST["page"];
	
	$q = new WP_Query([
			'post_type' => 'post',
			'paged' => $paged,
			'post_status' => 'publish'
		]);

	if ( $q->have_posts() ):
		
		echo "<div class='d-flex page-limit' data-page='/blog/page/" . $paged . "'>";
		
		while ( $q->have_posts() ) : $q->the_post();

			get_template_part( 'template-parts/content/blog', get_post_format() );
			
		endwhile;
		
		echo "</div>";
	
	endif;

	wp_reset_postdata();

	die();
}

function kisimaSaveContact(){
	$name = wp_strip_all_tags($_POST['name']);
	$email = wp_strip_all_tags($_POST['email']);
	$message = wp_strip_all_tags($_POST['message']);

	$args = [
		'post_title' => $name,
		'post_content' => $message,
		'post_author' => 1,
		'post_type' => 'kisima-contact',
		'post_status' => 'publish',
		'meta_input' => [
			'_kisima_email_val_key' => $email
		]
	];

	$postID = wp_insert_post( $args );

	if ( $postID != 0 ){

		$to = get_bloginfo('admin_email');
		$subject = "Kisima Contact Form - " . $name;
		$headers[] = "From: " . $name . "<" . $email . ">";
		// $headers[] = "Content-Type: text/html: charset=UTF-8";

		// wp_mail($to, $subject, $message, '', []);
		wp_mail($to, $subject, $message, $headers);
		echo $postID;
	}else{
		echo 0;
	}

	die();
}

function kisimaSaveFeedback(){
	$name = wp_strip_all_tags($_POST['name']);
	$email = wp_strip_all_tags($_POST['email']);
	$message = wp_strip_all_tags($_POST['feedback']);

	$args = [
		'post_title' => $name,
		'post_content' => $message,
		'post_author' => 1,
		'post_type' => 'kisima-feedback',
		'post_status' => 'draft',
		'meta_input' => [
			'_kisima_email_val_key' => $email
		]
	];

	$postID = wp_insert_post( $args );

	if ( $postID != 0 ){

		$to = get_bloginfo('admin_email');
		$subject = "Kisima User Feedback - " . $name;
		$headers[] = "From: " . $name . "<" . $email . ">";
		// $headers[] = "Content-Type: text/html: charset=UTF-8";

		// wp_mail($to, $subject, $message, '', []);
		wp_mail($to, $subject, $message, $headers);
		echo $postID;
	}else{
		echo 0;
	}

	die();
}

function kisimaCheckPaged( $num = null )
{
	$output = "";
	if ( is_paged() ){
		$output = "/page/" . get_query_var('paged');
	}

	if ( $num == 2 ) {
		$paged = ( get_query_var('paged') == 0 ? 2 : get_query_var('paged') );
		return $paged;
	}else{
		return $output;
	}
}