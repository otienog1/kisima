<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="hero-section p-rel">
	
</section>
<?php //layerslider(1) ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/page/content', 'page' );

		endwhile; // End of the loop.
		?>

<section class="section adventure-style-section bg-white">
	<div class="container">
		<h2 class=" section-title">Pick your Adventure Style</h2>
		<div class="row kisima-article">

			<div class="col-md-8 adventure reveal">
				<div class="adventure-style p-rel d-block" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/jason-briscoe-156643-1024x683.jpg);">
					<a class="" href="/africa-honeymoon-safari/">
						<div class="d-block adv-wrapper override-adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white ">Honeymoon Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>

			</div>
			<div class="col-md-4 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/henry-be-98915-1024x695.jpg);">
					<a class="" href="/agricultural-safaris/">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white ">Agricultural Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>

		</div>

		<div class="row kisima-article">

			<div class="col-md-4 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/pawan-sharma-364696-1024x683.jpg);">
					<a class="" href="/africa-cultural-safaris/">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white ">Cultural Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/shripal-daphtary-278736-1024x375.jpg);">
					<a class="" href="/wildebeest-migration-safaris/">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white ">Migration Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/madi-robson-113926-2-1024x682.jpg);">
					<a class="" href="philanthropic-safaris">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white ">Philanthropic Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>

		</div>

		<div class="row kisima-article">

			<div class="col-md-4 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/lionello-delpiccolo-168367-1024x683.jpg);">
					<a class="" href="/safaripackages/kenya-active-safaris/">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white">Active Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-8 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/10/gary-lopater-183558-1024x683.jpg);">
					<a class="" href="kenya-flying-safaris">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white">Flying Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-8 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/10/suhyeon-choi-104926-683x1024.jpg);">
					<a class="" href="/safaripackages/women-only-safaris/">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white">Women Only Safaris</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 adventure reveal">
				<div class="adventure-style" style="background-image: url(<?php echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']; ?>/wp-content/uploads/2017/09/igor-ovsyannykov-254180-1024x683.jpg);">
					<a class="" href="/tailor-made-safaris/">
						<div class="d-block adv-wrapper">
							<div class="d-block p-abs adv-text-wrapper">
								<h2 class="text-white">Tailor Made</h2>
								<div class="see-more">See More</div>
							</div>
						</div>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>



<section class="section recent-posts kisima-article">
	<div class="container">
		<h2 class=" section-title reveal">Recent blog posts</h2>
		<div class="row">
			<?php 

				$args = [
					'numberposts' => 3,
					'offset' => 0,
					'category' => 0,
					'orderby' => 'post_date',
					'post_type' => 'post',
					'post_status' => 'publish',

				];

				$i = 0;

				$posts = wp_get_recent_posts($args, OBJECT);
					// var_dump($posts);  die();
				$class = "";
				$anim = "";

				foreach ($posts as $post):

			?>
				<div class="col-md-4 kisima-article">
					<div class="recent-post-wrapper bx post-excerpt p-rel">
						<?php
							if ( has_post_thumbnail($post) ):
								$class = 'has-thumb';
								$anim = 'post-body-anim';
						?>
						<a href="<?php echo get_permalink($post->ID) ?>">
							<div class="recent-post-image" style="background-image: url(<?php the_post_thumbnail_url('homepage-thumb'); ?>);">
							</div>
						</a>
						<?php
							endif;	
						?>

						<div class="recent-post-body p-rel bg-white <?php echo $class . ' ' . $anim; ?>">

							<header class="entry-header">
								<?php
									$title = $post->post_title;;

									// esc_url( get_permalink() )
									$title = '<h2 class="entry-title recent-posts-title"><a href="' . get_permalink() . '" rel="bookmark">' . mb_convert_case($title, MB_CASE_TITLE, "UTF-8") . '</a></h2>';

									echo $title
								?>
							</header><!-- .entry-header -->
							<div class="recent-post-meta text-light small bg-white">
								<span><?php the_author(); ?></span> | <span><?php echo get_the_date() ?></span>
							</div>
							<div class="entry-content text-muted">
								<?php
									echo $post->post_content;
								?>
							</div><!-- .entry-content -->

							<?php
								// Author bio.
								// if ( is_single() && get_the_author_meta( 'description' ) ) :
								// 	get_template_part( 'author-bio' );
								// endif;
							?>
						</div>
						<div class="fader"></div>
						<footer class="entry-footer p-abs bg-white pb-2 px-3 d-flex justify-content-between">
							<a href="<?php the_permalink() ?>" class=" text-light"><?php _e('Read More') ?></a>
							<?php edit_post_link( __( 'Edit', 'kisima' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-footer -->
					</div>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
</section>


<section class="section feedback-wrapper kisima-article">
	<div class="container">
		<h2 class=" section-title mb-3 reveal">Testimonials</h2>
		<div class="row">

			<?php 
				$args = [
					'numberposts' => 3,
					'offset' => 0,
					'category' => 0,
					'orderby' => 'post_date',
					'post_type' => 'kisima-feedback',
					'post_status' => 'publish',

				];

				$query = wp_get_recent_posts($args, OBJECT);
				
				foreach ($query as $feedback) :
			?>


				<div class="col-md-4 reveal">
					<div class="feedback">
						<!-- <div class="avatar">
							image
						</div> -->
						<div class="body p-3">
							<i class="icon dashicons dashicons-format-quote"></i>
							<span class="text-muted">
								<?php echo $feedback->post_content ?>
							</span>
							<span class="name text-right d-block text-muted">~ <?php echo $feedback->post_title ?></span>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section financial-security" style="border-top: 1px solid rgba(0,0,0,.05)">
	<div class="container text-center">
		<h2 class="display-6 section-title">Financial Security</h2>
		<div class="body">
			<p>
				We assure your financial security when booking and your own personal safety when on safari. This is our highest priority!
			</p>
			<p>
				Our affiliation with KATO ( Kenya Association of Tour Operators ) , affords us access to numerous reputable and high caliber resources that provide a collective wealth of competitive travel options
			</p>
		</div>
	</div>
</section>

<section class="section bg-white kisima-article">
	<div class="container">
		<div class="row justify-content-around">
			<span class="in-patnership-with reveal">
				<img src="<?php echo get_template_directory_uri() ?>/img/kato.png" alt="">
			</span>
			<span class="in-patnership-with reveal">
				<img src="<?php echo get_template_directory_uri() ?>/img/magical-kenya.jpg" alt="">
			</span>
			<span class="in-patnership-with reveal">
				<img src="<?php echo get_template_directory_uri() ?>/img/kws.jpg" alt="">
			</span>
			<span class="in-patnership-with reveal">
				<img src="<?php echo get_template_directory_uri() ?>/img/safari-bookings.jpg" alt="">
			</span>
		</div>
	</div>
</section>


<?php get_footer();
