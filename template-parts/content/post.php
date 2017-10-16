<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part('template-parts/content/author-bio'); ?>

	<div class="entry-content">
		<?php  the_content(); ?>
		<!-- <?php
			// wp_link_pages( array(
			// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
			// 	'after'       => '</div>',
			// 	'link_before' => '<span>',
			// 	'link_after'  => '</span>',
			// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
			// 	'separator'   => '<span class="screen-reader-text">, </span>',
			// ) );
		?> -->
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

	<?php // kisimaSharePost(the_content()); ?>

</article><!-- #post-## -->