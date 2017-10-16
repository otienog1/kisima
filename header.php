<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Kisima
 * @since Kisima1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title('-', true); ?></title>
	<link rel="icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.png" type="image/x-icon">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	<section class="header-container bg-white">
		<nav class="navbar navbar-toggleable-sm navbar-kisima fixed-top">
	        <div class="container">
	        	<button role="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="toggler-icon"></span></button>
	        	
	        	<a href="<?php bloginfo('url'); ?>" class="navbar-brand"><img src="<?php echo get_template_directory_uri(); ?>/img/asset1.png" alt="<?php bloginfo('name'); ?>" style="width: 100px"></a>
	            <ul class="navbar-nav mr-auto hidden-sm-down">
	            </ul>

	            <?php
	            	wp_nav_menu( [
							'theme_location' => 'contact',
							'container' => false,
							'container_class' => '',
							'menu_class' => 'navbar-nav',
							'walker' => new Kisima_Walker_Nav_Primary()
						]
					 );
	            ?>

	            <form class="kisima-search-frm form-inline" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	            	<div class="field">
						<input class="form-control" type="search" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'Search entire site &hellip;', 'placeholder' ) ?>">
						<button class="btn" type="submit"><i class="dashicons dashicons-search"></i></button>
	            	</div>
				</form>
			</div>
		</nav>
	</section>
	<section id="header" class="bg-white">
		<?php get_template_part( 'template-parts/navigation/navigation' ); ?>
	</section>
