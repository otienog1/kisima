<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link 
 *
 * @package WordPress
 * @subpackage Kisima
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>