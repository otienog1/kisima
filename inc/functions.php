<?php

function kisimaSharePost( $content )
{

	$content .= '<div class="share-this text-center"><h4 class="display-7 text-muted">Share This</h4>';

	$title = get_the_title();
	$permalink = get_permalink();

	$twitterHandler = ( get_option('twitter_handler') ? '&amp;:via' . esc_attr( get_option('twitter_handler') ) : '' );

	$twitter = 'https://twitter.com/intent/tweet?text="Hey! Read this: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'"';
	$facebook = 'https://www.facebook.com/sharer/share.php?u=' . $permalink;
	$gplus = 'https://plus.google.com/share?url=' . $permalink;

	$content .= '<ul>';
	$content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow" class="bg-twitter"><i class="dashicons dashicons-twitter"></i></a></li>';
	$content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow" class="bg-facebook"><i class="dashicons dashicons-facebook-alt"></i></a></li>';
	$content .= '<li><a href="' . $gplus . '" target="_blank" rel="nofollow" class="bg-google"><i class="dashicons dashicons-googleplus"></i></a></li>';
	$content .= '</ul></div><!-- .share-this -->';

	echo $content;
}

function commentsNavigation()
{
	if( get_comment_pages_count() > 1 && get_option('page_comments') ):
		
		get_template_directory() . '/inc/templates/comments-navigation.php';

	endif;
	
}
