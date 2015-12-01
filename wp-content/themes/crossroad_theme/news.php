<?php
/**
* News Template
* Template Name:News
*
*/
 
get_header(); 
$args = array(
	'post_type'      => 'new',
	'posts_per_page' => '-1',		
	'order'          => 'DESC',	
	
);

$news_query = new WP_Query($args);
wp_reset_query();

if ( $news_query->have_posts() ) : ?>

<?php endif; ?>
<?php /* Start the Loop */ ?>
			<div class="tours-wrapper">	
			<div class="container tours-container news-home">
			<h1>News</h1>	
			<?php
			while($news_query->have_posts()) :
				$news_query->the_post(); ?>
			<div class="col-sm-4">
				<div class="tour-post">
				<?php if(has_post_thumbnail()): ?>
				<div class="image"><a href="<?php echo the_permalink(); ?>"><?php echo the_post_thumbnail('medium'); ?></a></div>
				<?php endif; ?>
				<div class="title">
					<h4><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
				</div>	
				<div class="date"><?php echo the_date(); ?></div>
				<a href="<?php echo the_permalink(); ?>" class="read-more">read more</a>			
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		
		</div>
		</div>
<?php get_footer(); ?>