<?php
/**
 * Pencil functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package pencil
 */

if ( ! function_exists( 'pencil_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pencil_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pencil, use a find and replace
		 * to change 'pencil' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'pencil', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'pencil' ),
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
			'audio',
			'video',
			'gallery',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'pencil_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
			) ) );

}
endif; // End of pencil_setup.
add_action( 'after_setup_theme', 'pencil_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pencil_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pencil_content_width', 720 );
}
add_action( 'after_setup_theme', 'pencil_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pencil_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pencil' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pencil_widgets_init' );

if ( ! function_exists( 'pencil_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function pencil_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Roboto, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'pencil' ) ) {
			$fonts[] = 'Roboto:700,400,400italic,300';
			}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Merriweather, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'pencil' ) ) {
			$fonts[] = 'Merriweather:700,700italic,400,400italic';
			}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'pencil' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
			} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
			} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
			} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
			}

			if ( $fonts ) {
			$fonts_url = esc_url( add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' ) );
			}

			return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function pencil_scripts() {

		$pencil_theme_info = wp_get_theme();

		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'pencil-fonts', pencil_fonts_url(), array(), null );

		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '4.4.0' );

		wp_enqueue_style( 'pencil-style', get_stylesheet_uri(), array(), $pencil_theme_info->get( 'Version' ) );

		wp_enqueue_script( 'slick', get_template_directory_uri() . '/slick/slick.min.js', array( 'jquery' ), '20150828', true );

		if ( ! is_404() && ! is_singular() && have_posts() ) { wp_enqueue_script( 'masonry' ); }

		if ( get_theme_mod( 'sticky_sidebar', 1 ) && is_active_sidebar( 'sidebar-1' ) ) { wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.2.2', true ); }

		if ( get_theme_mod( 'smooth_scroll', 1 ) ) { wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smoothscroll.min.js', array( 'jquery' ), '1.3.8', true ); }

		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '20150829', true );

		wp_enqueue_script( 'pencil-scripts', get_template_directory_uri() . '/js/pencil.min.js', array( 'jquery' ), $pencil_theme_info->get( 'Version' ), true );

		wp_enqueue_script( 'pencil-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

		// Preparing to pass variables to js -> used for loading more posts.
		global $wp_query;
		$pencil_ajax_max_pages = $wp_query->max_num_pages;
		$pencil_ajax_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
		$home_page_slider_play_speed = get_theme_mod( 'home_page_slider_play_speed', 0 );
		$home_page_slider_autoplay = ( 0 == $home_page_slider_play_speed ) ? false : true;

		// Passing theme options to pencil.js.
		wp_localize_script( 'pencil-scripts', 'pencil', array(
			'home_page_slider_img_number' => get_theme_mod( 'home_page_slider_img_number', 1 ),
			'home_page_slider_play_speed' => $home_page_slider_play_speed,
			'home_page_slider_autoplay' => $home_page_slider_autoplay,
			'loadMoreText' => esc_html__( 'Load more posts', 'pencil' ),
			// 'loadingText' => esc_html__('Loading posts...', 'pencil'),
			'noMorePostsText' => esc_html__( 'No more posts to load', 'pencil' ),
			'startPage' => $pencil_ajax_paged,
			'maxPages' => $pencil_ajax_max_pages,
			'nextLink' => next_posts( $pencil_ajax_max_pages, false ),
			) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pencil_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Hybrid Media Grabber for getting media from posts.
 */
require get_template_directory() . '/inc/class-media-grabber.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load TGMPA recommended plugins.
 */
require_once get_template_directory() . '/inc/tgmpa-plugins.php';
