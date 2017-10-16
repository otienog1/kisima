<?php
	if( post_password_required() ){
		return;
	}
?>

<div id="comments" class="comments-area">

	<?php 

		$fields = [
			'author' => '<div class="form-group"><label for="author">' . __( 'Name', 'kisima' ) . '</label><span class="required"> *</span><input type="text" id="author" name="author" class="form-control k-input" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required"></div>',
			'email' => '<div class="form-group"><label for="email">' . __( 'Email', 'kisima' ) . '</label><span class="required"> *</span><input type="email" id="author" name="email" class="form-control k-input" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required"></div>',
			'url' => '<div class="form-group"><label for="url">' . __( 'Website', 'kisima' ) . '</label><input type="text" id="author" name="url" class="form-control k-input" value="' . esc_attr( $commenter['comment_author_url'] ) . '"></div>',
		];

		$args = [
			'class_submit' => 'btn btn-secondary btn-k-form',
			'label_submit' => __( 'Submit Comment' ),
			'comment_field' => '<div class="form-group"><label for="comment">' . _x( 'Comment', 'nout' ) . '</label><span class="required"> *</span><textarea id="comment" rows="4" name="comment" class="form-control k-input" required="required"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
		];
	?>


	<?php comment_form($args); ?>
	<?php 
		if ( have_comments() ):
	?>

	<h2 class="comment-title display-7 text-muted my-3">
		<?php 
			printf(
				esc_html( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'kisima' ) ),
				number_format_i18n( get_comments_number() )
			) 
		?>
	</h2>

	<ol class="comment-list">
		<?php
			$args = [
				'walker' => new Kisima_Walker_Comment(),
				'max_depth' => '2',
				'style' => 'ol',
				'callback' => null,
				'end-callback' => null,
				'type' => 'all',
				'reply_text' => 'Reply',
				'page' => '',
				'per_page' => '',
				'avatar_size' => 64,
				'reverse_top_level' => true,
				'reverse_children' => '',
				'format' => 'html5',
				'short_ping' => false,
				'echo' => false
			]; 
			
			echo wp_list_comments( $args );
		?>
	</ol>

	<?php
		if( ! comments_open() && get_comments_number() ):
	?>
		<p class="no-comments"><?php esc_html_e('Comments are closed', 'kisima'); ?></p>
	<?php endif; ?>
	<?php
		endif;
	?>

</div>