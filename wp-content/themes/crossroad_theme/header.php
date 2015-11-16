<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crossroad_theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'crossroad_theme' ); ?>
</a>
<header id="masthead" class="site-header" role="banner"> 
	<!--<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'crossroad_theme' ); ?></button>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	
	<div class="header-wrapper">
		<div class="container header-container">
			<div class="languages"> <span class="flag-icon flag-icon-gr"></span>
				<?php
						$languages = icl_get_languages('skip_missing=0');
						$pointer = 0;
						$numLanguages = count($languages);
						foreach ($languages as $language):
							$class_name = '';
							if ($language["language_code"] == 'en') {
								$lang_pretty_name = 'eng';
							} else {
								$lang_pretty_name = 'fr';
							}
							if ($language['active'] == 1) {
								$class_name = 'active';
							}
							?>
				<a class="<?php echo $class_name; ?>" href="<?php echo $language['url']; ?>"> <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/img/<?php echo $language["language_code"] ?>.png" alt=""/></a>
				<?php if ($pointer++ < ($numLanguages - 1)): ?>
				<span></span>
				<?php endif; ?>
				<?php endforeach; ?>
				<span clas"eng"></span> </div>
			<div class="navigation-wrapper">
				<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="logo"	/></a></div>
				<div class="navigation-menu clearfix">
					<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation"> 
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
							<div class="clearfix"></div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- #masthead -->

<div id="content" class="site-content">
