<?php
/**
 * Starter WP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Starter WP
 */

if ( ! function_exists( 'starter_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function starter_wp_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/starter-wp
	 */
	load_theme_textdomain( 'starter-wp' );
 
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
        'primary' => esc_html__( 'Primary', 'starter-wp' ),
        'header-menu' => esc_html__( 'Header Menu', 'starter-wp' ),
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

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'starter_wp_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    // Custom logo support.
    add_theme_support( 'custom-logo' );
}
endif;
add_action( 'after_setup_theme', 'starter_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_wp_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'starter_wp_content_width', 1140 );
}
add_action( 'after_setup_theme', 'starter_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_wp_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'starter-wp' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'starter-wp' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header widget area', 'starter-wp' ),
        'id'            => 'header-widget',
        'description'   => esc_html__( 'Add widgets here.', 'starter-wp' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    for ( $i = 1; $i <= intval( 4 ); $i++ ) {
        register_sidebar( array(
            'name' 				=> sprintf( __( 'Footer %d', 'starter-wp' ), $i ),
            'id' 				=> sprintf( 'footer-%d', $i ),
            'description' 		=> sprintf( esc_html__( 'Widgetized Footer Region %d.','starter-wp' ), $i ),
            'before_widget'     => '<section id="%1$s" class="widget %2$s">',
            'after_widget' 		=> '</section>',
            'before_title' 		=> '<h3 class="widget-title">',
            'after_title' 		=> '</h3>',
            )
        );
    }
    if( igthemes_edd_activated() || igthemes_woocommerce_activated() ) {
        register_sidebar( array(
            'name'          => esc_html__( 'Shop widget area', 'starter-wp' ),
            'id'            => 'sidebar-shop',
            'description'   => esc_html__( 'Add widgets here.', 'starter-wp' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }

}
add_action( 'widgets_init', 'starter_wp_widgets_init' );


/**
 * Enqueue scripts and styles.
 */

function starter_wp_scripts() {
    wp_enqueue_style( 'starter-wp-style', get_stylesheet_uri() );

    wp_enqueue_script( 'starter-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'starter-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script( 'starter-wp-theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0', true );

    //conditional ie scripts
    global $wp_scripts;
    wp_enqueue_script('igthemes-ie9',
                 get_template_directory_uri() . '/js/ie-fix.js',
                 array(),
                 '1.0',
                 false );
    wp_enqueue_script('igthemes-ie9');
    wp_script_add_data('igthemes-ie9', 'conditional', 'lt IE 9');
}
add_action( 'wp_enqueue_scripts', 'starter_wp_scripts' );

//Gooogle fonts
function starter_wp_google_fonts() {
        wp_enqueue_style( 'starter-wp-fonts', '//fonts.googleapis.com/css?family='. apply_filters( 'igthemes_google_font', 'Open+Sans:300,300i,400,400i,700,700i&subset=latin-ext'));
}

add_action( 'wp_enqueue_scripts', 'starter_wp_google_fonts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/admin/options/customizer.php';
/**
 * Welcome screen.
 */
require get_template_directory() . '/inc/admin/welcome/welcome-screen.php';

/**
 * Template functions an actionss.
 */
require get_template_directory() . '/inc/render/template-functions.php';
require get_template_directory() . '/inc/render/template-tags.php';
require get_template_directory() . '/inc/render/template-dynamic-css.php';
require get_template_directory() . '/inc/render/extras.php';
//structure
require get_template_directory() . '/inc/render/structure/header.php';
require get_template_directory() . '/inc/render/structure/content-top.php';
require get_template_directory() . '/inc/render/structure/footer.php';
require get_template_directory() . '/inc/render/structure/loop.php';
require get_template_directory() . '/inc/render/structure/post.php';
require get_template_directory() . '/inc/render/structure/page.php';
//plugins
require get_template_directory() . '/inc/plugins/jetpack/jetpack-funtions.php';
require get_template_directory() . '/inc/plugins/beaver-builder/bbuilder-functions.php';

/*----------------------------------------------------------------------
# EDD SUPPORT
------------------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_edd_activated' ) ) {
    function igthemes_edd_activated() {
        return class_exists( 'Easy_Digital_Downloads' ) ? true : false;
    }
}
if (igthemes_edd_activated()) {
    require get_template_directory() . '/inc/plugins/edd/edd-functions.php';
}

/*----------------------------------------------------------------------
# WOOCOMMERCE SUPPORT
------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'igthemes_woocommerce_support' );
function igthemes_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Check if woocommerce is active and prevent fatal error
if ( ! function_exists( 'igthemes_woocommerce_activated' ) ) {
    function igthemes_woocommerce_activated() {
        return class_exists( 'woocommerce' ) ? true : false;
    }
}

if (igthemes_woocommerce_activated()) {
    require get_template_directory() . '/inc/plugins/woocommerce/wc-functions.php';
}
