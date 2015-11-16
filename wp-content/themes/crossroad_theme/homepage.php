<?php

/**
 * Homepage Template
 * Template Name: Homepage
 */
 
 get_header(); 
?>
<div class="slider">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo get_template_directory_uri();?>/img/slide1.jpg" alt="logo"	/>
      <div class="carousel-caption">
        <div class="layer"><p class="blue">your travel partner</p> <p class="white"> in greece</p></div><div class="overlay"></div>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo get_template_directory_uri();?>/img/slide2.jpg" alt="logo"	/>
      <div class="carousel-caption">
         <div class="layer"><p class="blue">your travel partner</p> <p class="white"> in greece</p></div><div class="overlay"></div>
      </div>
    </div>
   <div class="item">
      <img src="<?php echo get_template_directory_uri();?>/img/slide3.jpg" alt="logo"	/>
      <div class="carousel-caption">
         <div class="layer"><p class="blue">your travel partner</p> <p class="white"> in greece</p></div><div class="overlay"></div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<?php 

while (have_posts()):
	the_post();
	echo the_content();
endwhile;

$args = array(
	'post_type'      => 'news',
	'posts_per_page' => '9',		
	'order'          => 'DESC',
	'category_name'  => 'news'	
	
);

$news_query = new WP_Query($args);
wp_reset_query();

if ( $news_query->have_posts() ) : ?>

<?php endif; ?>
<?php /* Start the Loop */ ?>
			<div class="tours-wrapper">	
			<div class="container tours-container">	
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
				<a href="<?php echo the_permalink(); ?>">read more</a>			
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		
		</div>
		</div>

<?php get_footer();