<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crossroad_theme
 */

?>
</div>
<!-- #content -->
</div>
<!--page-->

<div class="push"></div>
</div>
<!--wrapper-->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">
		<div class="container">
			<div class="col-sm-3 col-xs-6">
				<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="logo"	/></a></div>
				<div class="address">Thessaloniki Greece Zefxidos 1 <br> & Iktinou in Boardwalk</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="links">
					<h4>useful links</h4>
					<ul class="pages-link">
						<li><a href="<?php echo get_bloginfo("url")?>/privacy-policy">privacy policy</a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/terms-conditions">terms & conditions</a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/cookies">cookies</a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/contact">contact</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3  col-xs-6 ">
				<div class="links">
					<h4>services</h4>
					<ul class="pages-link">
						<li><a href="<?php echo get_bloginfo("url")?>/accomondation">accomondation</a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/fly-drive">fly & drive </a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/transfers-car-rental">transfers & car rentals</a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/tours-2">tours </a></li>
						<li><a href="<?php echo get_bloginfo("url")?>/excursions">excursions</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<h4>contact us!</h4>
				<a href="tel:0030 2310 220174">(+30) 2310 220174</a>
				<h4> mail us!</h4>
				<a href="mailto:sales@thecrossroad.gr"><span class="not-capitalized">sales@thecrossroad.gr</span></a>
				<h4>you can find us!</h4>
				<a href="https://www.facebook.com/TheCrossRoadgr/"><i class="fa fa-facebook"></i></a></div>
			<div class="logos-wrapper clearfix">
				<div class="logos"><img src="<?php echo get_template_directory_uri();?>/img/iatathescrossroad.png" alt="logo"	/></div>
				<div class="logos"><img src="<?php echo get_template_directory_uri();?>/img/atgmth.png" alt="logo"	/></div>
				<div class="logos"><img src="<?php echo get_template_directory_uri();?>/img/GreeceThecrossroad.png" alt="logo"	/></div>
				<div class="logos"><img src="<?php echo get_template_directory_uri();?>/img/MHTE.png" alt="logo"	/></div>
				
			</div>
		</div>
		<div class="copyright">
			<div class="container">© the crossroad 2015 </div>
			<div class="container">M.H.T.E. 09.33.E.61.00.01077.00</div>
		</div>
	</div>
	<!-- .site-info --> 
</footer>
<!-- #colophon -->
</div>
<!-- #page -->

<?php wp_footer(); ?>
</body></html>