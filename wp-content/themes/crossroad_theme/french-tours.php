<?php
/**
* French Tours Template
* Template Name:French Tours
*
*/
 
get_header(); 

$args = array(
	'post_type'      => 'tours',
	'posts_per_page' => '-1',		
	'order'          => 'DESC',
	
	
);

$tours_query = new WP_Query($args);
wp_reset_query();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		

			<header class="page-header">
				<div class="tours"><div class="parallax"><div class="container"><div class="layer"><p class="blue">your travel partner</p> <p class="white"> in Greece</p><div class="overlay"></div></div></div></div></div>
				<div class="tours-title-wrapper">
					<div class="container header-tours-container">
					<?php
						the_title( '<h1 class="page-title">', '</h1>' );
						
					?>
					<a href="http://localhost/crossroad/excursions/"class="icon btn btn-round-icon white-bg"><i class="fa fa-suitcase"></i></a>
					<?php $fr = get_option('fr'); ?>
					<p class="tours-info"> <?php echo $fr; ?></p>
					</div>
				</div>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class="tours-wrapper">	
			<div class="container tours-container">	
			<?php
			while($tours_query->have_posts()) :
				$tours_query->the_post(); 
				$category= get_the_category();
				$cat_name  = $category[0]->cat_name;?>
			<div class="col-sm-4">
				<div class="tour-post">
				<?php if(has_post_thumbnail()): ?>
				<div class="image"><a href="<?php echo the_permalink(); ?>"><?php echo the_post_thumbnail('medium'); ?></a></div>
				<?php endif; ?>
				<div class="title">
					<h4><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
				</div>
				<div class="cat"><h5>tours</h5></div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		
		</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
