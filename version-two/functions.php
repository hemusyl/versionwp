<?php
/**
 * versiontwo functions and definitions
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'versiontwo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function versiontwo_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on versiontwo, use a find and replace
	 * to change 'versiontwo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'versiontwo', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'versiontwo' ),
        'footer_menu' => __('Footer Menu','versiontwo'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
       
    /*
    *WooCommerce Support
    */
    add_theme_support('woocommerce');
    
    /**
     * Add Support Custom Header
     */  
    add_theme_support( 'custom-header' );
    
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
        'image', 'video', 'quote', 'link','audio','gallery'
	) );
    
    /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );
    

}
endif; // versiontwo_setup

add_action( 'after_setup_theme', 'versiontwo_setup' );

/**
 *  enqueue scripts and styles
 */ 
function versiontwo_theme_file(){
	// Style CSS 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.0.3', 'all');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.0.3', 'all');
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.min.css', array(), '1.1.0', 'all');
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), '3.1.0', 'all');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.1.0', 'all');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array(), '3.1.0', 'all');
	wp_enqueue_style('style', get_stylesheet_uri());
    
	//Adding "Bitter" google fonts
    wp_enqueue_style( 'et-googleFonts', 'http://fonts.googleapis.com/css?family=Bitter:400,400italic,700');
    
	// jQuery call
	wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.3', TRUE);
	wp_enqueue_script('prettyPhoto-js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '3.1.0', TRUE);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), '3.1.0', TRUE);
	wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), '3.1.0', TRUE);
	wp_enqueue_script('respond-js', get_template_directory_uri() . '/js/respond.min.js', array(), '3.1.0', TRUE);

}
add_action('wp_enqueue_scripts', 'versiontwo_theme_file');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynch ronously.
 */ 
function versiontwo_customize_preview_js(){
    wp_enqueue_script('customize_preview',get_template_directory_uri().'/js/customize-preview.js',array( 'customize-preview' ), '1.0.2',true);
}
add_action('customize_preview_init','versiontwo_customize_preview_js');

/**
* Default Menu
*
**/
	function hk_media_menu() {
		echo '<ul class="nav navbar-nav">';
		if ('page' != get_option('show_on_front')) {
			echo '<li><a href="'. site_url() . '/">Home</a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}

/**
 * ----------------------------------------------------------------------------------------
 * Display meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'versiontwo_post_meta' ) ) {
	function versiontwo_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'versiontwo' ) . ' </li>';
			}

			// Get the post author.
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>|',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// Get the date.
			echo '<li class="meta-date"> ' . get_the_date() . ' </li>|';

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>|';
			}

			// The tags.
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . $tag_list . ' </li>|';
			}

			// Comments link.
			if ( comments_open() ) :
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a comment', 'versiontwo' ), __( 'One comment so far', 'versiontwo' ), __( 'View all % comments', 'versiontwo' ) );
				echo '</span>';
				echo '</li>';
			endif;

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( '<button type="button" class="btn btn-default btn-sm">Edit</button>', 'versiontwo' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}

/**
 * Register widget area.
 */
if ( ! function_exists( 'versiontwo_widget_init' ) ) {
	function versiontwo_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'versiontwo' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'versiontwo' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h2 class="widget-title">',
					'after_title' => '</h2>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'versiontwo' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'versiontwo' ),
					'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h2 class="widget-title">',
					'after_title' => '</h2>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'versiontwo_widget_init' );
}

/*
 * Code for not reload comment frequently
 */

function comment_scripts(){

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}

}
add_action( 'wp_enqueue_scripts', 'comment_scripts' );

/**
 * Files Call
 */
require get_template_directory() . '/inc/paigation.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Favicon
 */  
function add_my_favicon() {
   $favicon_path = get_template_directory_uri() . '/images/icons/favicon.png';

   echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
}
add_action( 'wp_head', 'add_my_favicon' ); //front end
add_action( 'admin_head', 'add_my_favicon' ); //admin end

/**
 * Header Image
 */ 
// The height and width of your custom header. You can hook into the theme's own filters to change these values.
// Add a filter to yourtheme_header_image_width and yourtheme_header_image_height to change these values.
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'versiontwo_header_image_width', 160 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'versiontwo_header_image_height',	60 ) );

/**
 *  Custom Body Background
 */ 

function versiontwo_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	return $classes;
}
add_filter( 'body_class', 'versiontwo_body_classes' );






