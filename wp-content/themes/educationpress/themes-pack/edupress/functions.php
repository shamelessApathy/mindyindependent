<?php
/**
 * edupress functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package edupress
 */
define( 'EDUPRESS_VERSION', '2.4' );

                       
//include the WPML installer in the theme
require get_template_directory() . '/installer/loader.php';
WP_Installer_Setup($wp_installer_instance,
    array(
        'plugins_install_tab' => 1, // optional, default value: 0
        'affiliate_id:wpml' => '176480', // optional, default value: empty
        'affiliate_key:wpml' => 'qb1JHh3gPXGB', // optional, default value: empty
        'src_name' => 'EduPress', // optional, default value: empty, needed for coupons
        'src_author' => '',// optional, default value: empty, needed for coupons
        'repositories_include' => array('wpml') // optional, default to empty (show all)
    )
);


/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

/*
 * Theme options configurations
 */
 function edupress_escape_string($string){
	return wp_kses($string, array( 'a' => array(
                                    'href' => array(),
                                    'title' => array(),
                                    'target' => array(),
                                ),
                                'em' => array(),
                                'strong' => array(), ) ); 
}

if( !function_exists( 'edupress_get_num_array' ) )
{
	function edupress_get_num_array() {
		$number_array = array();
		for( $i = 1; $i <= 20; $i++) {	
				//$number_array[$i] = esc_html__( $i, 'edupress' );
				$number_array[$i] = esc_html( $i );
		}
		return $number_array;
	}
}


if( !function_exists( 'edupress_is_a' ) )
{
	function edupress_is_a( $theme_mode ) {
		
		$demo_selected	= isset($_REQUEST['demo-select']) ? $_REQUEST['demo-select'] : false;
		if( $demo_selected !== false )
		{
			return $demo_selected == $theme_mode;
		}
		
		global $edupress_options;
		if( empty($edupress_options)) {
			$opt  = get_option( 'edupress_options' );
			
			if($opt)
				return $opt['edupress_theme_mode'] == $theme_mode;	
			else
				return $theme_mode == 'uni';	
		}
		return $edupress_options['edupress_theme_mode'] == $theme_mode;
	}
}
 
require_once ( get_template_directory() . '/inc/theme-options/custom/custom-init.php' );
require_once ( get_template_directory() . '/inc/theme-options/options-config.php' );

 
 /*
 * TGM plugin activation
 */
require_once ( get_template_directory() . '/inc/tgm/edupress-required-plugins.php' );


require_once ( get_template_directory() . '/inc/page-builder-widget/page-builder-widget.php' );

if( edupress_is_a('ecom') )
{
	require_once ( get_template_directory() . '/inc/ecom-tax-meta.php' );
}

//flush rewrite rules
add_action('after_switch_theme', 'edupress_university_after_switch_theme', 99);
function edupress_university_after_switch_theme () {
	flush_rewrite_rules(); 
}

/*
 * Utility functions
 */
require_once ( get_template_directory() . '/inc/Tax-meta-class/Tax-meta-class.php' );
require_once ( get_template_directory() . '/inc/util/basic-functions.php' );
require_once ( get_template_directory() . '/inc/util/header-functions.php' );


/*
 * Meta boxes configuration
 */
require_once ( get_template_directory() . '/inc/meta-boxes/config.php' );

/*
 * Widgets
 */
include_once ( get_template_directory() . '/inc/widgets/widget.php' );

/**
 * WooCommerce related functions for ecommerce theme mode
 */
if (edupress_is_a('ecom') && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once( get_template_directory() . '/inc/woo-setup.php' );
}


if ( ! function_exists( 'edupress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edupress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on edupress, use a find and replace
	 * to change 'edupress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'edupress', get_template_directory() . '/languages' );

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
	
	
	/*
	* Used on:
	* Single post page and Post archive pages
	* Single event page
	* Gallery pages
	*/
	set_post_thumbnail_size( 900, 350, true );
	add_image_size( 'edupress-related-posts', 360,162, true);
	
	add_image_size( 'edupress-small', 100,75, true);
	
	if( edupress_is_a( 'ecom' ) ) {
		//add_image_size( 'edupress-small', 100,75, true);
		
		add_image_size( 'edupress-ecommerce-home-thumbnail1', 570,470, true);
		add_image_size( 'edupress-ecommerce-home-thumbnail4', 277,270, true);
		add_image_size( 'edupress-ecommerce-home-thumbnail3', 570,270, true);
	}
	elseif( edupress_is_a( 'uni' ) ) {
		//add_image_size( 'edupress-small', 100,75, true);
		
		add_image_size( 'edupress-university-home-small-96-72', 96,72, true);
		
		add_image_size( 'edupress-university-home-small', 121,109, true);
		add_image_size( 'edupress-university-home-thumb', 360, 203, true);
	
	}
	elseif( edupress_is_a( 'kid' ) ) {
		//add_image_size( 'edupress-small', 100,75, true);
		add_image_size( 'edupress-kid-class-thumbnail', 360,270, true);
		add_image_size( 'edupress-kid-home-class-thumbnail', 262,197, true);
		
		add_image_size( 'edupress-kid-similar-course-widget', 100,75, true);
		add_image_size( 'edupress-kid-home-one-blog', 277,246, true);
		
		add_image_size( 'edupress-kid-home-one-gallery', 263,193, true);
		add_image_size( 'edupress-kid-home-one-gallery-big', 555, 374, true);
		add_image_size( 'edupress-kid-home-two-blog', 80,60, true);
	}
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Logged In Menu', 'edupress' ),
		'visiter' => esc_html__( 'Visiter Menu', 'edupress' ),
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
		'gallery',
		'image',
		'video',
		'quote',
		'audio',
	) );
	
	/*
	 * Enable support for WooCemmerce.
	*/
	add_theme_support( 'woocommerce' );	
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	add_theme_support( 'bbpress' );
	
	
	//update_option( 'edupress_is_theme_mode_avail', false );
	
	//var_dump(!get_option( 'edupress_is_theme_mode_avail', false )  );
	//die;
	
	
	
	//For thememode redirect first time
	/*if ( 
		get_option( 'edupress_is_theme_mode_avail', false ) != '0' 
	&&
	is_admin() 
	&&
  	in_array( 
		'redux-framework/redux-framework.php', 
		apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
	  ) 
	)
	*/
	
	
	if (
		get_option( 'edupress_is_disable_theme_mode_avail', false ) === false
	&&
		is_admin() 
	&&
  		in_array( 
		'redux-framework/redux-framework.php', 
		apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
	  ) 
	)
	{
		setcookie('redux_current_tab', '0', time() + 120);
		wp_redirect(admin_url("themes.php?page=_edupress_options&redux_current_tab=0") ) ; // Your admin page URL
		update_option( 'edupress_is_disable_theme_mode_avail', 1 );
		exit();
	}
	//End For thememode redirect first time

}
endif; // edupress_setup

add_action( 'redux/construct', 'edupress_radium_remove_as_plugin_flag' );
/**
* Remove plugin flag from redux. Get rid of redirect
*
* @since 1.0.0
*/
function edupress_radium_remove_as_plugin_flag() {
	ReduxFramework::$_as_plugin = false;
}

add_action( 'after_setup_theme', 'edupress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edupress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edupress_content_width', 640 );
}
add_action( 'after_setup_theme', 'edupress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edupress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'edupress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Main Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Search Blog', 'edupress' ),
		'id'            => 'search-listing',
		'description'   => esc_html__( 'Search Blog Listing Page Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Author', 'edupress' ),
		'id'            => 'blog-author',
		'description'   => esc_html__( 'Blog Author Page Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Listing', 'edupress' ),
		'id'            => 'blog-listing',
		'description'   => esc_html__( 'Blog Listing Page Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Detail', 'edupress' ),
		'id'            => 'blog-detail',
		'description'   => esc_html__( 'Blog Detail Page Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Event Listing', 'edupress' ),
		'id'            => 'event-listing',
		'description'   => esc_html__( 'Event Listing Page Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Event Detail', 'edupress' ),
		'id'            => 'event-detail',
		'description'   => esc_html__( 'Event Detail Page Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer First Column', 'edupress' ),
		'id'            => 'footer_1',
		'description'   => esc_html__( 'Footer First Column Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Second Column', 'edupress' ),
		'id'            => 'footer_2',
		'description'   => esc_html__( 'Footer Second Column Sidebar', 'edupress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	if( !edupress_is_a( 'kid' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Third Column', 'edupress' ),
			'id'            => 'footer_3',
			'description'   => esc_html__( 'Footer Third Column Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		) );
		if( !edupress_is_a( 'uni' ) )
		{
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Forth Column', 'edupress' ),
				'id'            => 'footer_4',
				'description'   => esc_html__( 'Footer Forth Column Sidebar', 'edupress' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			) );
		}
	}
	if( edupress_is_a( 'ecom' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Search Course', 'edupress' ),
			'id'            => 'search-course-listing',
			'description'   => esc_html__( 'Search Course Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Course Instructor', 'edupress' ),
			'id'            => 'course-instructor',
			'description'   => esc_html__( 'Course Instructor Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Course Listing', 'edupress' ),
			'id'            => 'course-listing',
			'description'   => esc_html__( 'Course Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Course Detail', 'edupress' ),
			'id'            => 'course-detail',
			'description'   => esc_html__( 'Course Detail Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Instructor Listing', 'edupress' ),
			'id'            => 'instructor-listing',
			'description'   => esc_html__( 'Instructor Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Cart and Checkout', 'edupress' ),
			'id'            => 'cart-checkout',
			'description'   => esc_html__( 'Cart, Checkout and My Account Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	elseif( edupress_is_a( 'uni' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Search Course', 'edupress' ),
			'id'            => 'search-course-listing',
			'description'   => esc_html__( 'Search Course Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Course Instructor', 'edupress' ),
			'id'            => 'course-instructor',
			'description'   => esc_html__( 'Course Instructor Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Course Listing', 'edupress' ),
			'id'            => 'course-listing',
			'description'   => esc_html__( 'Course Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Course Detail', 'edupress' ),
			'id'            => 'course-detail',
			'description'   => esc_html__( 'Course Detail Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Instructor Listing', 'edupress' ),
			'id'            => 'instructor-listing',
			'description'   => esc_html__( 'Instructor Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Campus Listing', 'edupress' ),
			'id'            => 'campus-listing',
			'description'   => esc_html__( 'Campus Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Campus Detail', 'edupress' ),
			'id'            => 'campus-detail',
			'description'   => esc_html__( 'Campus Detail Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	elseif( edupress_is_a( 'kid' ) ) { 
		
		register_sidebar( array(
			'name'          => esc_html__( 'Search Class', 'edupress' ),
			'id'            => 'search-class-listing',
			'description'   => esc_html__( 'Search Class Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Class Listing', 'edupress' ),
			'id'            => 'class-listing',
			'description'   => esc_html__( 'Course Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Class Detail', 'edupress' ),
			'id'            => 'class-detail',
			'description'   => esc_html__( 'Course Detail Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Teacher Listing', 'edupress' ),
			'id'            => 'instructor-listing',
			'description'   => esc_html__( 'Instructor Listing Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Class Teacher', 'edupress' ),
			'id'            => 'class-instructor',
			'description'   => esc_html__( 'Course Instructor Page Sidebar', 'edupress' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	
	
}
add_action( 'widgets_init', 'edupress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edupress_scripts() {
	
	global $edupress_options;
	if( edupress_is_a( 'ecom' ) ) {
		wp_enqueue_style( 'mmenu', get_template_directory_uri() . 
		'/assets/css/jquery.mmenu.all.css' );
	}
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	if ( is_rtl() ) {
	wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.min.css' );
	}
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css' );
	wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/assets/css/linearicons-admin.css' );

	wp_enqueue_style( 'edupress-globalcss', get_template_directory_uri() . '/assets/css/global.css', array(),EDUPRESS_VERSION );
		
	wp_enqueue_style( 'edupress-style', get_stylesheet_uri(), array(),EDUPRESS_VERSION );
	
	if( edupress_is_a( 'ecom' ) ) {
		wp_enqueue_style( 'edupress-ecom-style', get_template_directory_uri() . '/tmpl-css/ecom-style.css' );
	}
	elseif( edupress_is_a( 'uni' ) ) {
		if( is_post_type_archive( 'course' )  || is_page_template('uni-page-templates/tpl-courses.php')  || is_tax( 'course-category') || get_query_var('instructor') )   			wp_enqueue_style( 'jquery.dataTables', get_template_directory_uri() . '/assets/css/jquery.dataTables.min.css' );
		
		wp_enqueue_style( 'edupress-uni-style', get_template_directory_uri() . '/tmpl-css/uni-style.css' );
	}
	elseif( edupress_is_a( 'kid' ) ) {
		wp_enqueue_style( 'edupress-kid-style', get_template_directory_uri() . '/tmpl-css/kid-style.css' );
	}
	
	
	if ( is_rtl() ) {
		wp_enqueue_style( 'edupress-rtl', get_template_directory_uri() . '/rtl.css' );
		
		if( edupress_is_a( 'ecom' ) ) {
			wp_enqueue_style( 'edupress-ecom-rtl', get_template_directory_uri() . '/tmpl-css/ecom-rtl.css' );
		}
		elseif( edupress_is_a( 'uni' ) ) {
			wp_enqueue_style( 'edupress-uni-rtl', get_template_directory_uri() . '/tmpl-css/uni-rtl.css' );
			
		}
		elseif( edupress_is_a( 'kid' ) ) {
			wp_enqueue_style( 'edupress-kid-rtl', get_template_directory_uri() . '/tmpl-css/kid-rtl.css' );
		}
		
	}
	
	//Start for js
	
	 wp_enqueue_script('mmenu', get_template_directory_uri().'/assets/js/jquery.mmenu.min.all.js', array('jquery') );
	
	 wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );

	
	wp_enqueue_script( 'edupress-jsfunctions', get_template_directory_uri() . '/js/functions.js',  array('jquery'));

	if( edupress_is_a( 'ecom' ) ) {
		if (is_front_page() || is_page_template( 'page-templates/home.php' )) 
		{
			// search autocomplete and slider on certain pages
			wp_enqueue_script( 'jquery-ui-autocomplete' );
		}
		wp_enqueue_script( 'edupress-ecommerce-jsfunctions', get_template_directory_uri() . '/js/ecom-functions.js',  array('jquery'));
		wp_localize_script( 'edupress-ecommerce-jsfunctions', 'edupress_ecommerce_vars', 
				array( 
				'appTaxTag'              => 'product_cat',
				'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
				'ajax_url' => esc_url(admin_url( 'admin-ajax.php', 'relative' )),
				'nonce' => wp_create_nonce('love-it-nonce'),
				'loadgif' => get_template_directory_uri().'/images/heart-load.gif',
				'already_unliked_message' => esc_html__('You have already deleted this course from wishlist.', 'edupress'),
				'unliked_message' => esc_html__('Deleted', 'edupress'),
				'error_message' => esc_html__('Sorry, there was a problem processing your request.', 'edupress')
			) 
		);
		
		if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )  )  	{
			 wp_enqueue_script('bootstrap-tabcollapse', get_template_directory_uri().'/assets/js/bootstrap-tabcollapse.js', array('bootstrap') );
			 wp_add_inline_script( 'bootstrap-tabcollapse', "jQuery( document ).ready(function() { if(jQuery('#tab_list').length) { jQuery('#tab_list').tabCollapse(); } })");
		 }
	}
	elseif( edupress_is_a( 'uni' ) ) {
	
		if (is_front_page() || is_page_template( 'page-templates/home.php' )) 
		{
			// search autocomplete and slider on certain pages
			wp_enqueue_script( 'jquery-ui-autocomplete' );
		}
		wp_enqueue_script( 'edupress-ecommerce-jsfunctions', get_template_directory_uri() . '/js/uni-functions.js',  array('jquery'));
		wp_localize_script( 'edupress-ecommerce-jsfunctions', 'edupress_university_vars', 
				array( 
					
					'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
					'ajax_url' => esc_url(admin_url( 'admin-ajax.php', 'relative' )),
					'nonce' => wp_create_nonce('love-it-nonce'),
					'loadgif' => get_template_directory_uri().'/images/heart-load.gif',
					'already_unliked_message' => esc_html__('You have already deleted this course from wishlist.', 'edupress'),
					'unliked_message' => esc_html__('Deleted', 'edupress'),
					'error_message' => esc_html__('Sorry, there was a problem processing your request.', 'edupress')
				) 
			);
			if(  !empty( $edupress_options[ 'edupress_coursedetail_with_tab' ] ) && $edupress_options[ 'edupress_coursedetail_with_tab' ] )    	{
				 wp_enqueue_script('bootstrap-tabcollapse', get_template_directory_uri().'/assets/js/bootstrap-tabcollapse.js', array('bootstrap') );
				 wp_add_inline_script( 'bootstrap-tabcollapse', "jQuery( document ).ready(function() { jQuery('#tab_list').tabCollapse(); })");
			 }
			 
			
			 
		 if(  is_post_type_archive( 'course' )  || is_page_template('uni-page-templates/tpl-courses.php') ||  is_tax( 'course-category' )  || get_query_var('instructor')  )
		{	
			wp_enqueue_script( 'jquery.dataTables', get_template_directory_uri() . '/assets/js/jquery.dataTables.min.js', array('jquery') );	
			
			
		
			$data = array(
				'req_search' =>  !empty( $_GET[ 's' ] ) ?  $_GET[ 's' ] : '',
				'req_cat' =>  !empty( $_GET[ 'course-category' ] ) &&  !is_tax( 'course-category') ?  $_GET[ 'course-category' ] : (  is_tax( 'course-category') ? get_queried_object()->term_id:''),
				'req_instructor' =>  get_query_var('instructor')  ?  get_query_var('instructor')  : '',
				
			 );
			 
			 
			 $per_page = is_search() ? $edupress_options['edupress_coursesearch_number'] : $edupress_options['edupress_courselisting_number'];
			 
			 $searching = is_search() ? 'false' : 'true';
			 wp_add_inline_script('jquery.dataTables', "jQuery.noConflict();
					var data = ".json_encode($data).";
			 
					jQuery( document ).ready(function( $ ) {
						jQuery('#myTable').dataTable( {
							'processing': true,
							'serverSide': true,
							'searching':  ".$searching.",
							'pageLength': '".$per_page."',
							'language': {
							  'emptyTable': '".esc_html__('No course found.', 'edupress')."',
							  'zeroRecords': '".esc_html__('No matching courses found.', 'edupress')."',
							  'emptyTable': '".esc_html__('No course found.', 'edupress')."',
							  'loadingRecords': '".esc_html__('Loading...', 'edupress')."',
							  'processing': '".esc_html__('Processing...', 'edupress')."',
							  
							   'info': '".esc_html__('Showing _START_ to _END_ of _TOTAL_ courses', 'edupress')."',
							   'infoEmpty': '".esc_html__('Showing 0 to 0 of 0 courses', 'edupress')."',
							   'infoFiltered': '".esc_html__('(filtered from _MAX_ total courses)', 'edupress')."',
							   'paginate': {
									'first':       '".esc_html__('First', 'edupress')."',
									'last':    '".esc_html__('Last', 'edupress')."',
									'next':        '".esc_html__('Next', 'edupress')."',
									'previous':    '".esc_html__('Previous', 'edupress')."'
								},
							  
							  
							},
							'ajax': {
									'url':	'".esc_url(admin_url( 'admin-ajax.php' ))."?action=course_listing',
									'type': 'POST',
									'data': data 
									},
									
							'columns': [
									{ 'data': 'title', 'name': 'title' },
									{ 'data': 'course_cat' , 'name': 'course_cat' },
									{ 'data': 'course_start_date', 'name': 'course_start_date'  },
									{ 'data': 'course_length', 'name': 'course_length'  },
									{ 'data': 'course_created_date' , 'name': 'course_created_date' },
								],
							'columnDefs': [
							{ 
								'targets': 1,
								'orderable': false
								
							},
							{ 
								'targets': 3,
								'orderable': false
								
							}],
							'order': [[ 4, 'desc' ]]
						});
					});");
		}
		
	}
	elseif( edupress_is_a( 'kid' ) ) {
		wp_enqueue_script( 'edupress-kid-jsfunctions', get_template_directory_uri() . '/js/kid-functions.js',  array('jquery'));
	}
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
		wp_enqueue_style( 'edupress-ecommerce-woocss', get_template_directory_uri() . '/assets/css/woocommerce.css' );
		  
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	
  
	wp_enqueue_script( 'html5shiv',get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond',get_template_directory_uri() . '/js/respond.min.js', array(), '3.7.2', false );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if (is_front_page() || is_page_template( 'page-templates/home.php' )) 
	{
	// search autocomplete and slider on certain pages
	wp_enqueue_script( 'jquery-ui-autocomplete' );
	}
	
	if(is_home() || is_archive() || is_page_template( 'page-templates/tpl-gallery.php' ) || is_singular())
	{
		wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/fancybox/css/fancybox.css' );
		if(is_page_template( 'page-templates/tpl-gallery.php' ))
		{
			wp_enqueue_script( 'bootstrap-portfilter', get_template_directory_uri() . '/assets/js/bootstrap-portfilter.js');
		}
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/fancybox/js/jquery.fancybox.js');
		wp_enqueue_script( 'custom-fancybox', get_template_directory_uri() . '/assets/fancybox/js/custom.fancybox.js');
	}
	
	if ( is_singular('event')):
	wp_enqueue_script( 'countdown-plugin',get_template_directory_uri().'/assets/js/jquery.plugin.min.js',array( 'jquery' ) );
	wp_enqueue_script( 'countdown',get_template_directory_uri().'/assets/js/jquery.countdown.min.js');
	
	endif;
	if ( is_singular('event') || is_page_template( 'page-templates/tpl-contact.php' )):
	 if( !empty($edupress_options[ 'edupress_google_api_key' ]) )
		{
				wp_enqueue_script(
						'google-map-api',
						'//maps.google.com/maps/api/js?sensor=true&key='.$edupress_options['edupress_google_api_key'],
						array(),
						'',
						false
					);	
		}
		else
		{
			wp_enqueue_script(
						'google-map-api',
						'//maps.google.com/maps/api/js?sensor=true',
						array(),
						'',
						false
					);
		}
	endif;
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js',  array('jquery'));
	wp_add_inline_script( 'wow', 'new WOW().init();' );
	// parent theme assets/css/custom.css
	wp_enqueue_style(
		'edupress-custom',
		get_template_directory_uri(). '/assets/css/custom.css',
		array ( 'edupress-style' ),
		EDUPRESS_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'edupress_scripts',150 );



/* Mailchimp Subscribe Newsletter Filters //////////////*/
add_filter( 'mc4wp_form_css_classes', function( $classes ) { 
	$classes[] = 'form-inline';
	return $classes;
});



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';

add_action( 'template_redirect', 'edupress_coming_soon_template_redirect' );
function edupress_coming_soon_template_redirect()
{
	global $edupress_options;

	if ( !is_user_logged_in() && !empty( $edupress_options[ 'edupress_coming_soon' ] ) )
	{
		$file = get_template_directory().'/page-templates/tpl-under-construction.php';
		include($file);
		exit();
	}
		
}

// sanitize search term
add_filter( 'get_search_query', 'edupress_filter' );
function edupress_filter( $string ) {
	$string = strip_tags( $string );
	$string = trim( $string );
	$char_limit = 5000;
	if ( strlen( $string ) > $char_limit ) {
		$string = substr( $string, 0, $char_limit );
	}

	return $string;
}


add_filter( 'pre_get_posts', 'edupress_be_archive_query' );
function edupress_be_archive_query( $query ) {
	global $edupress_options;	
	if( is_admin() )
    {
        return $query;
    }
	if(!empty($edupress_options))
	{
		$number_of_events = intval( $edupress_options[ 'edupress_eventlisting_number' ] );	
	}

	if ( is_search() && $query->is_main_query() ){
		if(empty($_GET['post_type']))
		{
			$query->set('post_type', array('post'));
		}
    }
	
	if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) && $query->is_main_query() ) {
		$query->is_search = true;
		$query->is_home = false;
	}
	
	
	
	if( $query->is_main_query() && $query->is_post_type_archive('event') && $number_of_events >0) {
		$query->set( 'posts_per_page', $number_of_events );
	}
	
	return $query;
}


add_action( 'after_switch_theme', 'edupress_enforce_image_size_options' );
function edupress_enforce_image_size_options() {		
	update_option( 'medium_size_w', 360 );
	update_option( 'medium_size_h', 270 );
}
add_filter( 'pre_update_option_medium_size_w', 'edupress_filter_medium_size_w' );
function edupress_filter_medium_size_w( $newvalue ) {
	return 360;
}
add_filter( 'pre_update_option_medium_size_h', 'edupress_filter_medium_size_h' );
function edupress_filter_medium_size_h( $newvalue ) {
	return 270;
}

function edupress_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'edupress_move_comment_field_to_bottom' );
function edupress_custom_admin_script_enqueue($hook) {
    if ( 'appearance_page__edupress_options' != $hook ) {
        return;
    }
   wp_register_style( 'edupress_custom_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
   wp_enqueue_style( 'edupress_custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'edupress_custom_admin_script_enqueue' );


/* 
 * For admin side Login, forgot password and registration Page
 */
function edupress_login_logo() { 
	global $edupress_options;
	wp_enqueue_style( 'edupress-custom-admin-login', get_template_directory_uri() . '/assets/css/admin-login.css' );
	ob_start();
	 ?>
	  
      
	  <?php
	if ( !empty( $edupress_options['edupress_logo'] ) && !empty( $edupress_options['edupress_logo']['url'] ) ) {?>
   
   
        #login h1 a, .login h1 a {
            background: url(<?php echo $edupress_options['edupress_logo']['url'];?>) no-repeat center;
			background-size:80% 80%;
			width:auto;
			height:70px;
            
        }
    
<?php
	}
	else
	{ ?>
        #login h1 a, .login h1 a {
        	background: none; 
            background-image: none;            
			text-indent:inherit;
			font-size:25px;
            font-weight:bold;
			width:auto;
            text-transform:uppercase;
			height:auto;
        }
       <?php
	}
	$inline_style = ob_get_clean();	
	wp_add_inline_style('edupress-custom-admin-login', $inline_style);
}
add_action( 'login_enqueue_scripts', 'edupress_login_logo');

function edupress_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'edupress_login_logo_url' );

function edupress_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'edupress_login_logo_url_title' );

function edupress_filter_theme_page_templates( $page_templates, $this, $post ) {
	$ret_page_templates = array();
	foreach( $page_templates as $key=>$val ) {
		if( edupress_is_a( 'ecom' ) ) {
			if( stripos( $key, 'page-templates' ) === 0 || stripos( $key, 'ecom-page-templates' ) === 0)	
				$ret_page_templates[$key] = $val;
			
		}
		elseif( edupress_is_a( 'uni' ) ) {
			if( stripos( $key, 'page-templates' ) === 0 ||
			 stripos( $key, 'uni-page-templates' ) === 0)	
				$ret_page_templates[$key] = $val;
		}
		elseif( edupress_is_a( 'kid' ) ) {
			if( stripos( $key, 'page-templates' ) === 0 ||
			 stripos( $key, 'kid-page-templates' ) === 0)	
				$ret_page_templates[$key] = $val;	
		}
	}
    return $ret_page_templates;
}
add_filter( 'theme_page_templates', 'edupress_filter_theme_page_templates', 20, 3 );



add_filter( 'template_include', 'edupress_instructor_page_template', 99 );
function edupress_instructor_page_template( $template ) {
	if( get_query_var('instructor') ) {
		if( edupress_is_a( 'ecom' ) )
			$new_template = locate_template( array( 'ecom-instructor.php' ) );
		elseif( edupress_is_a( 'uni' ) )
			$new_template = locate_template( array( 'uni-instructor.php' ) );
		elseif( edupress_is_a( 'kid' ) )
				$new_template = locate_template( array( 'kid-instructor.php' ) );
		
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}

add_action('init', 'edupress_custom_rewrite_basic');
function edupress_custom_rewrite_basic() {
	global $edupress_options;
	$edupress_university_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
	add_rewrite_tag('%instructor%','([^/]*)');
	add_rewrite_rule('^'.$edupress_university_instructor_slug.'/([^/]*)/?', 'index.php?instructor=$matches[1]', 'top');
}

add_filter( 'query_vars', 'edupress_university_query_vars' );
function edupress_university_query_vars( $query_vars )
{
	//For instructor full listing page
	//in all theme mode
	$query_vars[] = 'instructor';
	//For serach category sidebar
	$query_vars[] = 'scat';
    return $query_vars;
}

//For Scroll To Top 
function edupress_add_scroll_to_top_link() {
	if( isset($GLOBALS['edupress_options']['edupress_scroll_top_btn']) && $GLOBALS['edupress_options']['edupress_scroll_top_btn'] )
	{
    ?>
    <!-- Return to Top -->
	<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <?php
	}
}
add_action( 'wp_footer', 'edupress_add_scroll_to_top_link', 100 );




