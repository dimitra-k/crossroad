<?php 
/**
 * privacy Template
 * Template Name:privacy
 */get_header(); ?>

	
<div class="privacy">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="container privacy-container">
			<h1> <?php echo the_title(); ?> </h1>
			</div>
			<div class="container inner-container"><?php echo the_content(); ?></div>

			

		<?php endwhile; // End of the loop. ?>

</div>
<?php get_footer(); ?>
