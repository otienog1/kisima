<nav class="comment-navigation" id="comment-nav-top" role="navigation">
	<h3 class="display-6"><?php esc_html_e( 'Comments navigation', 'kisima' ) ?></h3>
	<div class="row">
		<div class="col-md">
			<div class="comment-nav">
				<span class="fa fa-chevron-left"></span>
				<?php previous_comments_link( esc_html__('Older Comments', 'kisima') ); ?>
			</div>
			<div class="comment-nav">
				<?php next_comments_link( esc_html__('Newer Comments', 'kisima') ); ?>
				<span class="fa fa-chevron-right"></span>
			</div>
		</div>
	</div>
</nav>