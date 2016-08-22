<?php
/**
 * Iwooshop functions and definitions
 */

if ( ! function_exists( 'iwooshop_setup' ) ) :

function iwooshop_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'woocommerce' );
    add_editor_style();
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'iwooshop' ),
		'footer'  => __( 'Footer Menu', 'iwooshop' ),
	) );
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );
	add_theme_support('title-tag');
	add_theme_support( 'editor-style' );
	//add_theme_support( 'post-formats', array('aside','image','video','quote','link','gallery','status','audio','chat') );

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

    wp_insert_term('Testimonial Section','category',array('description' => 'This is an Testimonial section category,for Home Page.','slug' => 'testimonial-category'));

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
 	$GLOBALS['content_width'] = apply_filters( 'iwooshop_content_width', 840 );
}
endif; // iwooshop_setup
add_action( 'after_setup_theme', 'iwooshop_setup' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string Filtered title.
 */
function wpdocs_filter_wp_title( $title, $sep ) {
    global $paged, $page;
 
    if ( is_feed() )
        return $title;
 
    // Add the site name.
    $title .= get_bloginfo( 'name' );
 
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
 
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'iwooshop' ), max( $paged, $page ) );
 
    return $title;
}
add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );


/*==========================================================
 * Registers a widget area.
 ============================================================*/
function iwooshop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'iwooshop' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'iwooshop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
        'name'          => __( 'Header Shop Cart', 'iwooshop' ),
        'id'            => 'header-cart',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_box">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Shop Page Sidebar', 'iwooshop' ),
        'id'            => 'shop-sidebar',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="shop_sidebar sidebar_box widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Product Page Sidebar', 'iwooshop' ),
        'id'            => 'product-sidebar',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="product_sidebar sidebar_box widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );


    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'iwooshop' ),
        'id'            => 'page-sidebar',
        'description'   => __( 'Appears at the left of the content on pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="page_sidebar sidebar_box widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 1', 'iwooshop' ),
        'id'            => 'footer-sidebar-1',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sub_heading" ><span>',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 2', 'iwooshop' ),
        'id'            => 'footer-sidebar-2',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sub_heading" ><span>',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 3', 'iwooshop' ),
        'id'            => 'footer-sidebar-3',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sub_heading" ><span>',
        'after_title'   => '</span></div>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 4', 'iwooshop' ),
        'id'            => 'footer-sidebar-4',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'iwooshop' ),
        'before_widget' => '<div id="%1$s" class="footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sub_heading" ><span>',
        'after_title'   => '</span></div>',
    ) );
}
add_action( 'widgets_init', 'iwooshop_widgets_init' );

/**
 * Enqueues scripts and styles.
 */
function iwooshop_scripts() {
	
	// Theme stylesheet.
	wp_enqueue_style( 'iwooshop-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'bootslider-css', get_template_directory_uri() . '/css/bootslider.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'lightbox-css', get_template_directory_uri() . '/css/lightbox.min.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/css/responsive.css', array(), wp_get_theme()->get( 'Version' ) );
    
	// Load Jquery.

    wp_register_script( 'Jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'Jquery.min');

    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'bootstrap-js');

    wp_register_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'wow-js');

    wp_register_script( 'owl.carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'owl.carousel-js');

    wp_register_script( 'carousel_specifi', get_template_directory_uri() . '/js/carousel_specifi.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'carousel_specifi');

    wp_register_script( 'touchSwipe-js', get_template_directory_uri() . '/js/touchSwipe.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'touchSwipe-js');

    wp_register_script( 'fitvids-js', get_template_directory_uri() . '/js/fitvids.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'fitvids-js');

    wp_register_script( 'bootslider-js', get_template_directory_uri() . '/js/bootslider.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'bootslider-js');

    wp_register_script( 'lightbox-js', get_template_directory_uri() . '/js/lightbox.min.js', array(), wp_get_theme()->get( 'Version' ), true );
    wp_enqueue_script( 'lightbox-js');

    wp_register_script( 'plugin-js', get_template_directory_uri() . '/js/plugin.js', array(), wp_get_theme()->get( 'Version' ), true );     
    wp_enqueue_script( 'plugin-js');

    wp_register_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), wp_get_theme()->get( 'Version' ), true );     
    wp_enqueue_script( 'custom-js');


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'iwooshop_scripts' );

/*=================================================
 || Included Required Helper Functions
===================================================*/
require_once get_template_directory() . '/inc/tgmpa_init.php';
require_once get_template_directory() . '/inc/custom-functions.php';
require_once get_template_directory() . '/inc/customizer.php';
