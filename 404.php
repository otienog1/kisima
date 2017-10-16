<?php
	get_header()
?>

<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-6  error-404 m-auto align-item-middle">
				<div class="page-content">
					<h1 class="display-4"><?php _e( '404.', 'kisima' ); ?></h1>
					<h2 class="display-6"><?php _e( 'Oops! That page can&rsquo;t be found.', 'kisima' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'kisima' ); ?></p>

					<?php get_search_form(); ?>
				</div>
		</div>
	</div>
</section>

<?php
	get_footer()
?>