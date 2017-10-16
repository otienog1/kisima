<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Kisima
 * @since 1.0
 * @version 1.0
 */

?>
<nav class="navbar navbar-toggleable-md navbar-light fixed-main" role="navigation">
	<div class="container px-2">
		<button role="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="toggler-icon"></span></button>

		<a href="<?php bloginfo('url'); ?>" class="navbar-brand logo">
			<img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="" class="kisima-logo">
		</a>
		<div class="navbar-collapse collapse justify-content-md-center" id="navbarCollapse" aria-expanded="true">

		

			<?php 
				wp_nav_menu( [ 
					'theme_location' => 'main',
					'container' => '',
					'container_class' => '',
					'menu_class' => 'navbar-nav',
					'walker' => new Kisima_Walker_Nav_Primary()
					] 
				 );

			 ?>
		</div>
	</div>
</nav><!-- #site-navigation -->