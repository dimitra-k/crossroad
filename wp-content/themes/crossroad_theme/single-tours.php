<?php
/**
 * The template for displaying all single posts. * 
 *
 * @package crossroad_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while (have_posts()):
				the_post();
				echo the_content();
			endwhile;
?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
