<?php
/**
 * crossroad_theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crossroad_theme
 */

if ( ! function_exists( 'crossroad_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crossroad_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on crossroad_theme, use a find and replace
	 * to change 'crossroad_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'crossroad_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'crossroad_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'crossroad_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // crossroad_theme_setup
add_action( 'after_setup_theme', 'crossroad_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crossroad_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'crossroad_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'crossroad_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crossroad_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'crossroad_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'crossroad_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function crossroad_theme_scripts() {
	wp_enqueue_style ('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');	
	wp_enqueue_style( 'crossroad_theme-style', get_stylesheet_uri() );		
	wp_enqueue_style ('styles-css', get_template_directory_uri() . '/css/styles.css');		
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script('isotope.pkgd.min-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js');
	wp_enqueue_style( 'crossroad_theme-style', get_stylesheet_uri() );
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js');
	wp_enqueue_style( 'crossroad_theme-style', get_stylesheet_uri() );
	wp_enqueue_script( 'crossroad_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'crossroad_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crossroad_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function custom_post_type() {
	// Register tours post type
	$labels = array(
		'name'                => _x( 'Tours', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Tours', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Tours', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Tours', 'text_domain' ),
		'all_items'           => __( 'All Tours Posts', 'text_domain' ),
		'view_item'           => __( 'View Tours Posts', 'text_domain' ),
		'add_new_item'        => __( 'Add New Tours Post', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit ', 'text_domain' ),
		'update_item'         => __( 'Update ', 'text_domain' ),
		'search_items'        => __( 'Search ', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'tours',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'tours_posts', 'text_domain' ),
		'description'         => __( 'Tours Posts', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'			  => $rewrite,
	);
	register_post_type( 'tours_posts', $args );
	
	
	$labels = array(
		'name'                => _x( 'News', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'New', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'News', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent News', 'text_domain' ),
		'all_items'           => __( 'All News', 'text_domain' ),
		'view_item'           => __( 'View News', 'text_domain' ),
		'add_new_item'        => __( 'Add New New', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit News', 'text_domain' ),
		'update_item'         => __( 'Update News', 'text_domain' ),
		'search_items'        => __( 'Search News', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'news',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'new', 'text_domain' ),
		'description'         => __( 'New', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'			  => $rewrite,
	);
	register_post_type( 'new', $args );
		
	
	$labels = array(
		'name'                => _x( 'Excursions', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Excursion', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Excursions', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Excursions', 'text_domain' ),
		'all_items'           => __( 'All Excursions', 'text_domain' ),
		'view_item'           => __( 'View Excursions', 'text_domain' ),
		'add_new_item'        => __( 'Add New Excursion', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Excursions', 'text_domain' ),
		'update_item'         => __( 'Update Excursions', 'text_domain' ),
		'search_items'        => __( 'Search Excursions', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'excursions',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'excursion', 'text_domain' ),
		'description'         => __( 'Excursion', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'			  => $rewrite,
	);
	register_post_type( 'excursion', $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );