<div class="author-info">
	<div class="author-avatar">
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), 64 );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h3 class="author-title display-7"><?php the_author(); ?></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'All posts by %s', 'kisima' ), get_the_author() ); ?>
			</a><br/>
			<?php the_date('d - M - Y'); ?>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->