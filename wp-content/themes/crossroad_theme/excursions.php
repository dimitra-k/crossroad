<?php
/**
* Excursions Template
* Template Name:Excursions
*
*/
 
get_header(); 

$args = array(
	'post_type'      => 'excursion',		
	'posts_per_page' => '-1',		
	'order'          => 'DESC',	
	
);

$excursions_query = new WP_Query($args);
wp_reset_query();
?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( $excursions_query->have_posts() ) : ?>

			<header class="page-header">
				<div class="excursions"><div class="parallax"><div class="container"><div class="layer"><p class="blue">your travel partner</p> <p class="white"> in Greece</p><div class="overlay"></div></div></div></div></div>
				<div class="excursions-title-wrapper">
					<div class="container header-excursions-container">
					<?php
						the_title( '<h1 class="page-title">', '</h1>' );
						
					?>
					<a href="http://localhost/crossroad/excursions/"class="icon btn btn-round-icon white-bg"><i class="fa fa-bus"></i></a>
					<p class="excursions-info">Greece is a country based on diversity, no matter what your clients preferences are, we will provide you with the best shouted activity for them. Give your clients the opportunity to experience something unique, and enrich their journey with all kind of excursions throughout Greece.   </p>
					</div>
				</div>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class="excursions-wrapper">	
			<div class="container excursions-container">
			<div class="button-group filter-button-group">			
				  <button data-filter="*">all</button>
			<?php
				$args = array(
				  'orderby' => 'name',				  
				  'parent' => 0. 
				 
				  );
				$categories = get_categories('exclude=73,1');
				foreach ( $categories as $category ) {
	echo '<button data-filter=".' .$category->name . '">from ' . $category->name . '</button>';
}
?>			 
			</div>
			<div class="grid">
			<?php
			while($excursions_query->have_posts()) :
				$excursions_query->the_post(); 
				$category= get_the_category();
				$cat_name  = $category[0]->cat_name;?>
			
			<div class="col-sm-4 grid-item <?php echo $cat_name; ?>  " data-filter="<?php echo $cat_name; ?>">
				<div class="tour-post">			
				<?php if(has_post_thumbnail()): ?>
				<div class="image"><a href="<?php echo the_permalink(); ?>"><?php echo the_post_thumbnail('medium'); ?></a></div>
				<?php endif; ?>
			
				<div class="title">
					<h4><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
				</div>
				<div class="cat"><h5>from <?php echo $cat_name; ?></h5></div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
		</div>
		</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
