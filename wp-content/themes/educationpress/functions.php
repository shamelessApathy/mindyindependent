<?php
/**
 * educationpress functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package educationpress
 */
 
define( 'EDUCATIONPRESS_VERSION', '2.4' );
/*
 * TGM plugin activation
 */
require_once ( get_template_directory() . '/inc/tgm/edu-press-required-plugins.php' );

                       
//include the WPML installer in the theme
require get_template_directory() . '/installer/loader.php';
WP_Installer_Setup($wp_installer_instance,
    array(
        'plugins_install_tab' => 1, // optional, default value: 0
        'affiliate_id:wpml' => '176480', // optional, default value: empty
        'affiliate_key:wpml' => 'qb1JHh3gPXGB', // optional, default value: empty
        'src_name' => 'EducationPress', // optional, default value: empty, needed for coupons
        'src_author' => '',// optional, default value: empty, needed for coupons
        'repositories_include' => array('wpml') // optional, default to empty (show all)
    )
);
require_once ( get_template_directory() . '/inc/page-builder-widget/page-builder-widget.php' );


/*
 * Theme options configurations
 */
require_once ( get_template_directory() . '/inc/theme-options/custom/custom-init.php' );


 
require_once ( get_template_directory() . '/inc/theme-options/options-config.php' );

/*
 * Utility functions
 */
require_once ( get_template_directory() . '/inc/Tax-meta-class/Tax-meta-class.php' );
require_once ( get_template_directory() . '/inc/tax-meta.php' );
require_once ( get_template_directory() . '/inc/util/basic-functions.php' );
require_once ( get_template_directory() . '/inc/util/header-functions.php' );


/*
 * Meta boxes configuration
 */
require_once ( get_template_directory() . '/inc/meta-boxes/config.php' );


/*
 * Widgets
 */
include_once ( get_template_directory() . '/inc/widgets/similar-courses-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/recent-posts-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/recent-course-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/recent-event-widget.php' );


include_once ( get_template_directory() . '/inc/widgets/course-cat-filter-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/course-lang-filter-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/course-price-filter-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/course-search-widget.php' );


/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

if ( ! function_exists( 'educationpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function educationpress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on educationpress, use a find and replace
	 * to change 'educationpress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'educationpress', get_template_directory() . '/languages' );
	if( !get_option('educationpress_version', false) ) {
		flush_rewrite_rules();
		update_option( 'educationpress_version', EDUCATIONPRESS_VERSION );
	}
	
	add_theme_support( 'coursepress' );
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
	
	add_image_size( 'educationpress-related-posts', 360,162, true);
	
	add_image_size( 'educationpress-course-list', 360,270, true);
	
    add_image_size( 'educationpress-home-thumbnail1', 570,470, true);
	
	add_image_size( 'educationpress-home-thumbnail4', 277,270, true);
    add_image_size( 'educationpress-home-thumbnail3', 570,270, true);
		
		

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Logged In Menu', 'educationpress' ),
		'visiter' => esc_html__( 'Visiter Menu', 'educationpress' ),
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


	add_theme_support( 'bbpress' );
	//add_theme_support( 'buddypress' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	
	$installed = get_option( 'cp_first_install', false );
	$educationpress_total_enroll = get_option( 'educationpress_total_enroll', false );
	$educationpress_total_reviews = get_option( 'educationpress_total_reviews', false );
	if ( !get_option( 'educationpress_theme_first_2',false ) ) {
		flush_rewrite_rules();
		if ( !get_option( 'users_can_register',false ) ) {
			update_option( 'users_can_register', true );
		}
		update_option( 'educationpress_theme_first_2', true);
		update_option( 'educationpress_theme_version', '2.0');
	}
	
	if ( $installed && !$educationpress_total_enroll ) 
	{
		//Make user registration on when first time install
		if ( !get_option( 'users_can_register',false ) ) {
			update_option( 'users_can_register', true );
		}
		update_option('educationpress_total_enroll', true);
		$post_args = array(
		'order'          => 'ASC',
		'post_type'      => 'course',
		'post_status'    => 'publish',
		'posts_per_page' =>  -1,
		);
		$courses = get_posts( $post_args );
		if ( count( $courses)>0 ) :
			foreach ( $courses as $inscou )
			{ 
				if(get_post_meta( $inscou->ID, 'total_enroll', true )!=CoursePress_Data_Course::count_students( $inscou->ID  ) || get_post_meta( $inscou->ID, 'total_enroll', true )=="")
				{
					update_post_meta( $inscou->ID, 'total_enroll', CoursePress_Data_Course::count_students( $inscou->ID  ) );
				}
				 $is_paid = cp_is_true(CoursePress_Data_Course::get_setting($inscou->ID ,'payment_paid_course',false));
				if ( !$is_paid && (get_post_meta( $inscou->ID, 'cp_mp_product_price', true )=="" || get_post_meta( $inscou->ID, 'cp_mp_product_price', true )>0)) {
					update_post_meta( $inscou->ID, 'cp_mp_product_price', 0 );
				}
			}
		endif;
	}
	if ( $installed && !$educationpress_total_reviews && class_exists('RichReviews')) 
	{
		update_option('educationpress_total_reviews', true);
		$post_args = array(
		'order'          => 'ASC',
		'post_type'      => 'course',
		'post_status'    => 'publish',
		'posts_per_page' =>  -1,
		);
		$courses = get_posts( $post_args );
		if ( count( $courses)>0 ) :
			foreach ( $courses as $inscou )
			{ 
				if(get_post_meta( $inscou->ID, 'total_reviews', true )!=educationpress_get_course_average_rating("post",$inscou->ID) || get_post_meta( $inscou->ID, 'total_reviews', true )=="")
				{
					update_post_meta( $inscou->ID, 'total_reviews', educationpress_get_course_average_rating("post",$inscou->ID) );
				}
			}
		endif;
	}
}
endif; // educationpress_setup

add_action( 'after_setup_theme', 'educationpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function educationpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'educationpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'educationpress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function educationpress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'educationpress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Main Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Search Blog', 'educationpress' ),
		'id'            => 'search-listing',
		'description'   => esc_html__( 'Search Blog Listing Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Search Course', 'educationpress' ),
		'id'            => 'search-course-listing',
		'description'   => esc_html__( 'Search Course Listing Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Author', 'educationpress' ),
		'id'            => 'blog-author',
		'description'   => esc_html__( 'Blog Author Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Listing', 'educationpress' ),
		'id'            => 'blog-listing',
		'description'   => esc_html__( 'Blog Listing Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Detail', 'educationpress' ),
		'id'            => 'blog-detail',
		'description'   => esc_html__( 'Blog Detail Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Event Listing', 'educationpress' ),
		'id'            => 'event-listing',
		'description'   => esc_html__( 'Event Listing Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Event Detail', 'educationpress' ),
		'id'            => 'event-detail',
		'description'   => esc_html__( 'Event Detail Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Course Instructor', 'educationpress' ),
		'id'            => 'course-instructor',
		'description'   => esc_html__( 'Course Instructor Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Course Listing', 'educationpress' ),
		'id'            => 'course-listing',
		'description'   => esc_html__( 'Course Listing Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Course Detail', 'educationpress' ),
		'id'            => 'course-detail',
		'description'   => esc_html__( 'Course Detail Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Instructor Listing', 'educationpress' ),
		'id'            => 'instructor-listing',
		'description'   => esc_html__( 'Instructor Listing Page Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer First Column', 'educationpress' ),
		'id'            => 'footer_1',
		'description'   => esc_html__( 'Footer First Column Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Second Column', 'educationpress' ),
		'id'            => 'footer_2',
		'description'   => esc_html__( 'Footer Second Column Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Third Column', 'educationpress' ),
		'id'            => 'footer_3',
		'description'   => esc_html__( 'Footer Third Column Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Forth Column', 'educationpress' ),
		'id'            => 'footer_4',
		'description'   => esc_html__( 'Footer Forth Column Sidebar', 'educationpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'educationpress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function educationpress_scripts() {
	
	global $educationpress_options;
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/assets/css/jquery.mmenu.all.css' );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	if ( is_rtl() ) {
	wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.min.css' );
	}
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css' );
	
	wp_enqueue_style( 'educationpress-globalcss', get_template_directory_uri() . '/assets/css/global.css', array(),EDUCATIONPRESS_VERSION );
		
	wp_enqueue_style( 'educationpress-style', get_stylesheet_uri(), array(),EDUCATIONPRESS_VERSION );
	if ( is_rtl() ) {
		wp_enqueue_style( 'educationpress-rtl', get_template_directory_uri() . '/rtl.css' );
	}	
	
	if ( class_exists( 'CoursePress_Core' )  && CoursePress_Core::get_setting( 'woocommerce/enabled' ) &&  in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ))) {
		wp_enqueue_style( 'educationpress-woocss', get_template_directory_uri() . '/assets/css/woocommerce.css', array(),EDUCATIONPRESS_VERSION );
	}
	
	
	
	 wp_enqueue_script('mmenu', get_template_directory_uri().'/assets/js/jquery.mmenu.min.all.js', array('jquery') );
	
	 wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );
	 
	 if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  )  	{
		 wp_enqueue_script('bootstrap-tabcollapse', get_template_directory_uri().'/assets/js/bootstrap-tabcollapse.js', array('bootstrap') );
		 wp_add_inline_script( 'bootstrap-tabcollapse', "jQuery( document ).ready(function() { jQuery('#tab_list').tabCollapse(); })");
	 }

	
	wp_enqueue_script( 'educationpress-jsfunctions', get_template_directory_uri() . '/js/functions.js',  array('jquery'));
	wp_localize_script( 'educationpress-jsfunctions', 'educationpress_vars', 
			array( 
				'appTaxTag'              => 'course_category',
				'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
				'ajax_url' => esc_url(admin_url( 'admin-ajax.php', 'relative' )),
				'nonce' => wp_create_nonce('love-it-nonce'),
				'loadgif' => get_template_directory_uri().'/images/heart-load.gif',
				'already_unliked_message' => esc_html__('You have already deleted this course from wishlist.', 'educationpress'),
				'unliked_message' => esc_html__('Deleted', 'educationpress'),
				'error_message' => esc_html__('Sorry, there was a problem processing your request.', 'educationpress')
			) 
		);
	
		  
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
		if( !empty($educationpress_options[ 'educationpress_google_api_key' ]) )
		{
				wp_enqueue_script(
						'google-map-api',
						'//maps.google.com/maps/api/js?sensor=true&key='.$educationpress_options['educationpress_google_api_key'],
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
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
	{
		wp_enqueue_style( 'edupress-ecommerce-woocss', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	}
	
	// parent theme assets/css/custom.css
	wp_enqueue_style(
		'educationpress-parent-custom',
		get_template_directory_uri(). '/assets/css/custom.css',
		array ( 'educationpress-style' ),
		EDUCATIONPRESS_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'educationpress_scripts',150 );


//Sorting
add_filter('posts_orderby', 'educationpress_edit_c_sorts_orderby');
function educationpress_edit_c_sorts_orderby($ads_orderby) {
global $educationpress_options,$wpdb;
if(!empty($educationpress_options['educationpress_courselisting_default_sort']))
{
$default_sort =  $educationpress_options[ 'educationpress_courselisting_default_sort' ];
}
if(!empty($educationpress_options['educationpress_coursesearch_default_sort']))
{
$default_coursesearch_sort =  $educationpress_options[ 'educationpress_coursesearch_default_sort' ];
}
if(!is_admin()  && (is_post_type_archive('course') && is_main_query()) || is_page_template( 'page-templates/tpl-courses.php' )){
	
	 if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=='alphabet_az') || ($default_sort=='alphabet_az' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "$wpdb->posts.post_title ASC";
	 }
	 if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=='alphabet_za') || ($default_sort=='alphabet_za' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "$wpdb->posts.post_title DESC";
	 }
	 if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=='new_first') || ($default_sort=='new_first' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "$wpdb->posts.post_date DESC";
	 }
	 if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=='old_first') || ($default_sort=='old_first' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "$wpdb->posts.post_date ASC";
	 }
	
 }

 
 if(!is_admin()  && is_search() && !empty($_GET['post-type']) && $_GET['post-type']=='course'){
	
	 if( (!empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=='alphabet_az') || ($default_coursesearch_sort=='alphabet_az' && empty($_GET['c_sort'])))
	 {
	 	$ads_orderby = "$wpdb->posts.post_title ASC";
	 }
	 if((  !empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=='alphabet_za') || ($default_coursesearch_sort=='alphabet_za' && empty($_GET['c_sort'])))
	 {
	 	$ads_orderby = "$wpdb->posts.post_title DESC";
	 }
	 if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=='new_first') || ($default_coursesearch_sort=='new_first' && empty($_GET['c_sort'])))
	 {
	 	$ads_orderby = "$wpdb->posts.post_date DESC";
	 }
	 if( ( !empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=='old_first') || ($default_coursesearch_sort=='old_first' && empty($_GET['c_sort'])))
	 {
	 	$ads_orderby = "$wpdb->posts.post_date ASC";
	 }
	 
	  if( (!empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=='phigh_low') || ($default_coursesearch_sort=='phigh_low' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "m2.meta_value+0 DESC";
	 }
	  if( ( !empty( $_GET['c_sort'] ) && $_GET['c_sort']=='plow_high') || ($default_coursesearch_sort=='plow_high' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "m2.meta_value+0 ASC";
	 }
	 if( ( !empty( $_GET['c_sort'] ) && $_GET['c_sort']=='ratings') || ($default_coursesearch_sort=='ratings' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "m2.meta_value+0 DESC";
	 }
	 if( (!empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=='popular') || ($default_coursesearch_sort=='popular' && empty($_GET['c_sort']) ))
	 {
	 	$ads_orderby = "m2.meta_value+0 DESC";
	 }
	
 }

 return $ads_orderby;
}



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

function educationpress_custom_init() {
	global $educationpress_options,$wp;
	$wp->add_query_var( 'scat' );
	if(!empty($educationpress_options))
	{
		if($educationpress_options['educationpress_coursedetail_reviewratings'] && class_exists('RichReviews'))
		{
			remove_action( 'rr_do_review_content', 'do_review_body',4);
			remove_action( 'rr_do_review_wrapper', 'full_width_wrapper');
			remove_action( 'rr_do_review_wrapper', 'column_wrapper');
			remove_action( 'rr_do_review_content', 'do_post_title',1);
			remove_action( 'rr_do_review_content', 'do_hidden_post_title',1);
			remove_action( 'rr_do_review_content', 'do_url_schema',2);
			remove_action( 'rr_do_review_content', 'omit_url_schema',2);
			remove_action( 'rr_do_review_content', 'do_the_date',3);
			remove_action( 'rr_do_review_content', 'do_the_date_hidden',3);
			remove_action( 'rr_close_testimonial_group', 'print_credit');
			remove_action( 'rr_close_testimonial_group', 'render_custom_styles');
		}
	}
     
	if(isset( $GLOBALS[ 'mp_cart' ])){
		remove_action( 'wp_footer', array( $GLOBALS[ 'mp_cart' ], 'floating_cart_html' ) );
	}
	
	//for remove course archive menu from menus from coursepress pro
	remove_filter( 'wp_nav_menu_objects', 'CoursePress_View_Front_General::main_navigation_links', 10 );
}
add_action( 'init', 'educationpress_custom_init' );

function educationpress_admin_review_update() {
	global $educationpress_options,$pagenow;
	if(!empty($educationpress_options))
	{
		if($educationpress_options['educationpress_coursedetail_reviewratings'] && class_exists('RichReviews'))
		{		
			if ( in_array( $pagenow, array( 'admin.php' ) ) &&  ( isset($_GET['page']) && (  $_GET['page'] == 'fp_admin_approved_reviews_page' || $_GET['page'] == 'fp_admin_pending_reviews_page'))) {
				
				if (isset($_REQUEST['review'])) 
				{
					
					$ids = is_array($_REQUEST['review']) ? $_REQUEST['review'] : array($_REQUEST['review']);
					if (!empty($ids)) 
					{
						foreach ($ids as $id) 
						{
							global $wpdb,$richReviews;
							$query = "SELECT post_id 
							FROM $richReviews->sqltable
							WHERE id=\"$id\"";
							$post_ID = $wpdb->get_var( $query );
							
							delete_transient( '_course_avereview_'.$post_ID  );
							delete_transient( '_course_appreview_'.$post_ID );				
		
							delete_transient(  '_course_star_'.$post_ID.'_5' );
							delete_transient(  '_course_star_'.$post_ID.'_4');
							delete_transient(  '_course_star_'.$post_ID.'_3' );
							delete_transient(  '_course_star_'.$post_ID.'_2' );
							delete_transient(  '_course_star_'.$post_ID.'_1' );
							update_post_meta( $post_ID, 'total_reviews', educationpress_get_course_average_rating("post",$post_ID) );
						}
					}
				}
			}
		}
	}
}
add_action( 'shutdown', 'educationpress_admin_review_update' );



add_filter( 'pre_get_posts', 'educationpress_be_archive_query' );
function educationpress_be_archive_query( $query ) {
	if(is_admin())
		return $query;
	
	global $educationpress_options;


	
	
		
	if(!empty($educationpress_options['educationpress_courselisting_number']))
	{
		$number_of_courses = intval( $educationpress_options[ 'educationpress_courselisting_number' ] );
	}
	if(!empty($educationpress_options['educationpress_coursesearch_number']))
	{
		
		$number_of_search_courses = intval( $educationpress_options[ 'educationpress_coursesearch_number' ] );
	}
	if(!empty($educationpress_options['educationpress_courselisting_default_sort']))
	{
		$default_sort = $educationpress_options[ 'educationpress_courselisting_default_sort' ];
		$default_coursesearch_sort = $educationpress_options[ 'educationpress_coursesearch_default_sort' ];
	}
	
	
	//only showing publish course
	if( is_post_type_archive('course') && $query->query_vars['post_type'] == 'course' && empty( $query->query_vars['post_status'] ) ) {
		$query->set('post_status', 'publish');
	}
	
	
	
	if ( is_search() && $query->is_main_query() ){
		
		if(isset($_GET['post-type']) && $_GET['post-type']=='course')
		{
			
			
			$query->set('post_type', array('course'));
			$query->set( 'posts_per_page', $number_of_search_courses );
			
		}
		else
		{
			$query->set('post_type', array('post'));
		}
		
    }

	

	if( $query->is_main_query() && ($query->is_post_type_archive('course')) || $query->is_tax( 'course_category' )) 
	{
		if( !is_search() && $number_of_courses >0 )
		{
			$query->set( 'posts_per_page', $number_of_courses );
		}
		
		if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=="plow_high") || $default_sort=="plow_high") 
		{
			$query->set( 'meta_key', 'cp_mp_product_price' );
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'ASC');
		}
		if( (!empty( $_GET['c_sort'] ) && $_GET['c_sort']=="phigh_low") || $default_sort=="phigh_low")
		{
			$query->set( 'meta_key', 'cp_mp_product_price' );
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'DESC');
		}
		if( (!empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=="popular") || $default_sort=="popular")
		{
			$query->set( 'meta_key', 'total_enroll' );
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'DESC');
		}
		if( (!empty( $_GET['c_sort'] ) &&  $_GET['c_sort']=="ratings") || $default_sort=="ratings" && class_exists('RichReviews'))
		{
			$query->set( 'meta_key', 'total_reviews' );
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'DESC');
		}
		if ( !empty( $_GET['free'] ) && empty( $_GET['paid'] ) ) {
					
			//$freecourse =$_GET['free'];
			$meta_query[] = array(
					'key' => 'cp_payment_paid_course',
					//'value' => $freecourse,
					//'compare' => 'LIKE',
				);
		}
		
		if ( empty( $_GET['free'] ) && !empty( $_GET['paid'] ) ) {
					
				$freecourse =$_GET['paid'];
				$meta_query[]  = array(
					'key' => 'cp_payment_paid_course',
					'value' => $freecourse,
					'compare' => 'LIKE',
				);
				
		}
		
		
		if (  !empty( $_GET['lang'] ) ) {
					
				$c_lang_arr = explode(",", $_GET["lang"]);
				
				$meta_query[] = array(
					'key' => 'course_language',
					'value' => $c_lang_arr,
					'compare' => 'IN',
				);

			
			
		}
		if (  !empty( $_GET['lang'] ) ||  !empty( $_GET['paid'] ) || !empty( $_GET['free'] )) 
		{
			if ( ! empty( $meta_query ) ) 
			{
				$query->set( 'meta_query', $meta_query);
			}
		}
		
	}
	
	if( $query->is_main_query() && $query->is_post_type_archive('event') && $number_of_events >0) {
		$query->set( 'posts_per_page', $number_of_events );
	}
	
	return $query;
}

function educationpress_course_reviews($data){?>
    <li class="clearfix" itemtype="http://schema.org/Review" itemscope="">
    <?php 
	$default='';
	echo get_avatar( $data['rEmail'], 150, $default, $data['rName'], array('class'=>'author'));?>
    <div class="review-right">
    <a href="#" class="author-name" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><span itemprop="name"><?php echo esc_html($data['rName']); ?></span></a>
    <div class="time"><?php echo esc_html(human_time_diff(mysql2date( 'U', $data['rDateTime']), current_time( 'timestamp' ) )) ; ?> <?php esc_html_e( 'ago', 'educationpress' ); ?><span class="rating"><?php echo esc_html($data['rRating']); ?></span></div>
    <div style="display:none;" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
            <span itemprop="ratingValue">
                <?php echo esc_html($data['rRatingVal']); ?>
    
            </span>
            <span itemprop="bestRating">
                5
            </span>
            <span itemprop="worstRating">
                1
            </span>
    </div>
    </div>
    <div class="review-des">
    <p><?php echo esc_html($data['rTitle']); ?></p>
    <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Product">
    <div class="rr_review_post_id" itemprop="name" style="display:none;">
        <a href="<?php echo esc_url( get_permalink($data['rPostId'])); ?>">
            <?php echo esc_html($data['rCategory']); ?>
        </a>
    </div>
    <div class="clear"></div>
	</span>
    <p><span itemprop="reviewBody"><?php echo esc_html($data['rText']); ?></span></p>
    </div>
    </li>
<?php
}
add_action('rr_do_review_content', 'educationpress_course_reviews');
function educationpress_coming_soon_template_redirect()
{
	global $educationpress_options;

	if ( !is_user_logged_in() && !empty( $educationpress_options[ 'educationpress_coming_soon' ] ) )
	{
		$file = get_template_directory().'/page-templates/tpl-under-construction.php';
		include($file);
		exit();
	}
		
}

add_action( 'template_redirect', 'educationpress_coming_soon_template_redirect' );

function educationpress_filter( $string ) {
	$string = strip_tags( $string );
	$string = trim( $string );
	$char_limit = 5000;
	if ( strlen( $string ) > $char_limit ) {
		$string = substr( $string, 0, $char_limit );
	}

	return $string;
}
// sanitize search term
add_filter( 'get_search_query', 'educationpress_filter' );

// load search filters only on frontend
if ( ! is_admin() ) {
	
	add_filter( 'posts_join', 'educationpress_custom_search_join', 99, 2 );
	add_filter( 'posts_where', 'educationpress_custom_search_where', 99, 2 );
	add_filter( 'posts_groupby', 'educationpress_custom_search_groupby' );
	
}

function educationpress_custom_search_join( $join, &$pass_query ) {
	global $wpdb;

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post-type']) && $_GET['post-type']=='course' && $pass_query->is_main_query()) {

		$join  = " LEFT JOIN $wpdb->term_relationships AS r ON ($wpdb->posts.ID = r.object_id) ";
		$join .= " LEFT JOIN $wpdb->term_taxonomy AS x ON (r.term_taxonomy_id = x.term_taxonomy_id) ";
		$join .= " AND (x.taxonomy = 'course_category' OR 1=1) ";

		// if an ad category is selected, limit results to that cat only
		$catid = get_query_var( 'scat' );

		if ( ! empty( $catid ) ) {

			// put the catid into an array
			(array) $include_cats[] = $catid;

			// get all sub cats of catid and put them into the array
			$descendants = get_term_children( (int) $catid, 'course_category' );

			foreach ( $descendants as $key => $value ) {
				$include_cats[] = $value;
			}

			// take catids out of the array and separate with commas
			$include_cats = "'" . implode( "', '", $include_cats ) . "'";

			// add the category filter to show anything within this cat or it's children
			$join .= " INNER JOIN $wpdb->term_relationships AS tr2 ON ($wpdb->posts.ID = tr2.object_id) ";
			$join .= " INNER JOIN $wpdb->term_taxonomy AS tt2 ON (tr2.term_taxonomy_id = tt2.term_taxonomy_id) ";
			$join .= " AND tt2.term_id IN ($include_cats) ";

		}

		$join .= " INNER JOIN $wpdb->postmeta AS m ON ($wpdb->posts.ID = m.post_id) ";
		$join .= " INNER JOIN $wpdb->postmeta AS m2 ON ($wpdb->posts.ID = m2.post_id) ";
		$join .= " INNER JOIN $wpdb->postmeta AS m3 ON ($wpdb->posts.ID = m3.post_id) ";
		$join .= " LEFT JOIN $wpdb->terms AS t ON x.term_id = t.term_id ";

		remove_filter( 'posts_join', 'educationpress_custom_search_join' );
	}

	return $join;
}


/**
 * Builds the WHERE part in search queries.
 *
 * @param string $where
 *
 * @return string
 */
function educationpress_custom_search_where( $where, &$pass_query ) {
	global $wpdb;

	$old_where = $where; // intercept the old where statement

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post-type']) && $_GET['post-type']=='course' && $pass_query->is_main_query() ) {

	

		$query = '';

		$var_q = stripslashes( $_GET['s'] );

		if ( $var_q == '' ) {
			$search_terms = array($var_q);
		} else {
			preg_match_all( '/".*?("|$)|((?<=[\\s",+])|^)[^\\s",+]+/', $var_q, $matches );
			$search_terms = array_map( create_function( '$a', 'return trim($a, "\\"\'\\n\\r ");' ), $matches[0] );
		}

		if ( ! isset( $_GET['exact'] ) ) {
			$_GET['exact'] = '';
		}

		$n = ( $_GET['exact'] ) ? '' : '%';

		$searchand = '';
		$search_terms = array_filter($search_terms);
		foreach ( (array) $search_terms as $term ) {
			$term = addslashes_gpc( $term );

			$query .= "{$searchand}(";

				$query .= "($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
				$query .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
				$query .= " OR ((t.name LIKE '{$n}{$term}{$n}')) OR ((t.slug LIKE '{$n}{$term}{$n}'))";

							

			$query .= ")";
			$searchand = ' AND ';
		}

		$term = esc_sql( $var_q );
		
		if ( !empty( $_GET['free'] ) && empty( $_GET['paid'] ) ) {
					
					//$freecourse =$_GET['free'];
					$freecourse = 'on';
					$query .= "{$searchand}(";
					$query .= "(m.meta_key = 'cp_payment_paid_course')";
					//$query .= " AND (m.meta_value LIKE '{$n}{$freecourse}{$n}')";
					$query .= " AND (m.meta_value NOT LIKE '{$n}{$freecourse}{$n}')";
					$query .= ")";
					$searchand = ' AND ';
		}
		
		if ( empty( $_GET['free'] ) && !empty( $_GET['paid'] ) ) {
					
					$freecourse =$_GET['paid'];
					$query .= "{$searchand}(";
					$query .= "(m.meta_key = 'cp_payment_paid_course')";
					$query .= " AND (m.meta_value LIKE '{$n}{$freecourse}{$n}')";
					$query .= ")";
					$searchand = ' AND ';
		}
		
		
		if (  !empty( $_GET['lang'] ) ) {
					
				$c_lang_arr = explode(",", $_GET["lang"]);
				$query .= "{$searchand}(";
					$query .= "(m3.meta_key = 'course_language')";
				
				$meta_val_like = array();
				for($i=0;$i<count($c_lang_arr);$i++)
				{
					$lang_i=$c_lang_arr[$i];
					$meta_val_like[] = "m3.meta_value LIKE '{$n}{$lang_i}{$n}'";
					
				}
				
				
				$query .= " AND (".implode(' OR ', $meta_val_like).")";
				
				$query .= ")";
				
				$searchand = ' AND ';
		}
		
		
		
		
		
		
		if ( !empty( $_GET['c_sort'] ) &&   ($_GET['c_sort']=='phigh_low'  || $_GET['c_sort']=='plow_high')) {
					
					$query .= "{$searchand}(";
					$query .= "(m2.meta_key = 'cp_mp_product_price')";
					$query .= ")";
					$searchand = ' AND ';
		}
		
		if ( !empty( $_GET['c_sort'] ) &&   $_GET['c_sort']=='ratings') {
					
					$query .= "{$searchand}(";
					$query .= "(m2.meta_key = 'total_reviews')";
					$query .= ")";
					$searchand = ' AND ';
		}
		
		if ( !empty( $_GET['c_sort'] ) &&   $_GET['c_sort']=='popular') {
					
					$query .= "{$searchand}(";
					$query .= "(m2.meta_key = 'total_enroll')";
					$query .= ")";
		}
		

		if ( count( $search_terms ) > 1 && $search_terms[0] != $var_q ) {
				$query .= " OR ($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
				$query .= " OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
			
		}
		if (  empty( $search_terms ) ) {
			
			$where = " AND ($wpdb->posts.post_status = 'publish') ";

			// setup the array for post types
			$post_type_array = array();

			// always include the ads post type
			$post_type_array[] = 'course';

			

			// build the post type filter sql from the array values
			$post_type_filter = "'" . implode( "','", $post_type_array ) . "'";

			// return the post type sql to complete the where clause
			$where .= " AND ($wpdb->posts.post_type IN ($post_type_filter)) ";
			
		}

		if ( ! empty( $query ) ) {

			$where = " AND ({$query}) AND ($wpdb->posts.post_status = 'publish') ";

			// setup the array for post types
			$post_type_array = array();

			// always include the ads post type
			$post_type_array[] = 'course';

			

			// build the post type filter sql from the array values
			$post_type_filter = "'" . implode( "','", $post_type_array ) . "'";

			// return the post type sql to complete the where clause
			$where .= " AND ($wpdb->posts.post_type IN ($post_type_filter)) ";

		}

		remove_filter( 'posts_where', 'educationpress_elearning_custom_search_where' );
	}

	return $where;
}

function educationpress_custom_search_groupby( $groupby ) {
	global $wpdb;

	if ( is_search() && isset( $_GET['s'] ) && isset($_GET['post-type']) && $_GET['post-type']=='course') {
		$groupby = "$wpdb->posts.ID";

		remove_filter( 'posts_groupby', 'educationpress_custom_search_groupby' );
	}

	return $groupby;
}

// search suggest

add_action( 'wp_ajax_nopriv_educationpress-ajax-tag-search-front', 'educationpress_cp_suggest' );
add_action( 'wp_ajax_educationpress-ajax-tag-search-front', 'educationpress_cp_suggest' );




/**
 * Ajax auto-complete taxonomy search suggest.
 *
 * @return void
 */
function educationpress_cp_suggest() {
	global $wpdb;

	$s = $_GET['term']; // is this slashed already?

	if ( isset( $_GET['tax'] ) ) {
		$taxonomy = sanitize_title( $_GET['tax'] );
	} else {
		die( 'no taxonomy' );
	}

	if ( false !== strpos( $s, ',' ) ) {
		$s = explode( ',', $s );
		$s = $s[count( $s ) - 1];
	}
	$s = trim( $s );
	if ( strlen( $s ) < 2 ) {
		die( esc_html__( 'need at least two characters', 'educationpress' ) ); // require 2 chars for matching
	}

	$terms = $wpdb->get_col( "
		SELECT t.slug FROM $wpdb->term_taxonomy AS tt INNER JOIN $wpdb->terms AS t ON tt.term_id = t.term_id ".
		"WHERE tt.taxonomy = '$taxonomy' AND tt.count > 0 ".
		"AND t.name LIKE (
			'%$s%'
		)" .
		"LIMIT 50"
	);

	if ( empty( $terms ) ) {
		echo wp_json_encode( $terms );
		die;
	} else {
		$i = 0;
		foreach ( $terms as $term ) {
			$results[ $i ] = get_term_by( 'slug', $term, $taxonomy );
			$i++;
		}
		echo wp_json_encode( $results );
		die;
	}
}


function educationpress_update_cart_count()
{
		if ( class_exists( 'CoursePress_Core' )  && CoursePress_Core::get_setting( 'woocommerce/enabled' 
		) &&  in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) )) ) {
			global $woocommerce;
			$total_cour = $woocommerce->cart->cart_contents_count;
		}
		else {
			$total_cour = mp_cart()->item_count( false, false );			
			//$total_cour = mp_items_count_in_cart();
		}
		
		echo $total_cour;
		die;
}

add_action( 'wp_ajax_nopriv_educationpress_update_cart_count', 'educationpress_update_cart_count' );
add_action( 'wp_ajax_educationpress_update_cart_count', 'educationpress_update_cart_count' );


function educationpress_mpcart($menu, $args) {
			
			if ( ( !in_array( 'marketpress/marketpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || !function_exists( 'mp_cart' ) ) && !(class_exists( 'CoursePress_Core' ) && CoursePress_Core::get_setting( 'woocommerce/enabled' ) &&  in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) )) )
			)
			return $menu;
			
			$plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
			
			if (  !in_array( 'coursepress/coursepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ))
			{
				return $menu;
			}
			
			
			
			if($args->theme_location=='primary' || $args->theme_location=='visiter')
			{
				
				if ( CoursePress_Core::get_setting( 'woocommerce/enabled' ) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ))) {
					global $woocommerce;
					
					$cart_url = $woocommerce->cart->get_cart_url();
					$total_cour = $woocommerce->cart->cart_contents_count;
				}
				else {
					$total_cour = mp_cart()->item_count( false, false );
					$cart_url = mp_cart()->cart_url();
				
					
				}
			$viewing_cart = esc_html__('View your cart', 'educationpress');
			
			ob_start();
			$menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. $cart_url .'" title="'. $viewing_cart .'">';

			$menu_item .= '<i class="lnr lnr-cart"></i> ';

			
			$menu_item .= '<span id="cart_item_count">'.$total_cour.'</span>';
			$menu_item .= '</a></li>';
	
			echo $menu_item;
			$social = ob_get_clean();
			return $menu . $social;
			}
			return $menu;

}
add_filter('wp_nav_menu_items','educationpress_mpcart', 10, 2);
add_action( 'after_switch_theme', 'educationpress_enforce_image_size_options' );
function educationpress_enforce_image_size_options() {		
	update_option( 'medium_size_w', 360 );
	update_option( 'medium_size_h', 270 );
}
add_filter( 'pre_update_option_medium_size_w', 'educationpress_filter_medium_size_w' );
function educationpress_filter_medium_size_w( $newvalue ) {
	return 360;
}
add_filter( 'pre_update_option_medium_size_h', 'educationpress_filter_medium_size_h' );
function educationpress_filter_medium_size_h( $newvalue ) {
	return 270;
}
function educationpress_insert_new_review($data, $options, $sqltable)
{
	$post_ID = $data['post_id'];
	
	delete_transient( '_course_avereview_'.$post_ID  );	

	delete_transient( '_course_appreview_'.$post_ID );
	delete_transient(  '_course_star_'.$post_ID.'_5' );
	delete_transient(  '_course_star_'.$post_ID.'_4');
	delete_transient(  '_course_star_'.$post_ID.'_3' );
	delete_transient(  '_course_star_'.$post_ID.'_2' );
	delete_transient(  '_course_star_'.$post_ID.'_1' );
	update_post_meta( $post_ID, 'total_reviews', educationpress_get_course_average_rating("post",$post_ID) );
}
add_action('rr_on_valid_data', 'educationpress_insert_new_review', 1, 3);

function educationpress_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'educationpress_move_comment_field_to_bottom' );

function educationpress_custom_admin_script_enqueue($hook) {
    /*if ( 'appearance_page__educationpress_options' != $hook ) {
        return;
    }
	*/
   wp_register_style( 'educationpress_custom_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
   wp_enqueue_style( 'educationpress_custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'educationpress_custom_admin_script_enqueue' );

/*
 * For cart empty message 
 */
function educationpress_no_item_in_cart_message( $default_message ) {	
	if( function_exists( 'disable_cart' ) ) {
		$disable_cart = mp_get_setting( 'disable_cart', 0 );	
	}
	else {
		$disable_cart = 0;	
	}
	$message = '<div class="mp_cart_empty">';
			$message .= '<p class="mp_cart_empty_message">';
			if ( $disable_cart == '1' ) {
				$message .= esc_html__( 'The cart is disabled.', 'educationpress' );
			} else {
				$message .= sprintf( __( 'There are no items in your cart - <a href="%s">go add some</a> !', 'educationpress' ), esc_url( home_url() . '/' . get_option( 'coursepress_course_slug', 'courses' ) ) );
			}
			$message .= '</p><!-- end mp_cart_empty_message -->';
			$message .= '</div><!-- end mp_cart_empty -->';

	return $message;
}
add_filter( 'mp_cart/no_items_message', 'educationpress_no_item_in_cart_message');

function educationpress_shipping_total( $default_html ) {
	return '';
}
add_filter( 'mp_cart/cart_meta/shipping_total', 'educationpress_shipping_total');

/* 
 * For admin side Login, forgot password and registration Page
 */
function educationpress_login_logo() { 
	global $educationpress_options;
	wp_enqueue_style( 'educationpress-custom-forgot', get_stylesheet_directory_uri() . '/assets/css/forgot-password.css' );
	ob_start();
	 ?>
	  
      
	  <?php
	if ( !empty( $educationpress_options['educationpress_logo'] ) && !empty( $educationpress_options['educationpress_logo']['url'] ) ) {?>
   
   
        #login h1 a, .login h1 a {
            background: url(<?php echo $educationpress_options['educationpress_logo']['url'];?>) no-repeat center;
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
	wp_add_inline_style('educationpress-custom-forgot', $inline_style);
}
add_action( 'login_enqueue_scripts', 'educationpress_login_logo');

function educationpress_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'educationpress_login_logo_url' );

function educationpress_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'educationpress_login_logo_url_title' );


add_action( 'coursepress_course_status_changed', 'educationpress_coursepress_course_status_changed', 10, 2 );
function educationpress_coursepress_course_status_changed( $course_id, $user_id ) {
	if ( class_exists( 'CoursePress_Core' )  && CoursePress_Core::get_setting( 'woocommerce/enabled' ) ) {
		$woo_product_id = CP_WooCommerce_Integration::woo_product_id( $course_id );
		update_post_meta($course_id, 'mp_product_id', $woo_product_id );
		update_post_meta($course_id, 'meta_mp_product_id', $woo_product_id );
	}
	
}
/*
 * For Woocommerce shop page redirect to archive course page
 */
if ( class_exists( 'CoursePress_Core' )  && CoursePress_Core::get_setting( 'woocommerce/enabled' ) ) {	
	add_action( 'init', 'educationpress_add_filter_for_cart_item_permlink' );
	function educationpress_add_filter_for_cart_item_permlink() {
		add_filter( 'woocommerce_cart_item_permalink', 'educationpress_woocommerce_cart_item_permalink', 10, 3); 
	}
	function educationpress_woocommerce_cart_item_permalink( $product_permalink, $cart_item, $cart_item_key ){
		if( !empty($cart_item['data']->post->post_parent) && intval($cart_item['data']->post->post_parent) > 0)
			return get_the_permalink( intval($cart_item['data']->post->post_parent) );
		else
			'';
	}
}

add_filter('oembed_result','educationpress_oembed_result', 10, 3);
function educationpress_oembed_result($html, $url, $args) {
    $html = str_ireplace('frameborder="0"', '', $html);
    return $html;
}
//For Scroll To Top 
function educationpress_add_scroll_to_top_link() {
	if( isset($GLOBALS['educationpress_options']['educationpress_scroll_top_btn']) && $GLOBALS['educationpress_options']['educationpress_scroll_top_btn'] )
	{
    ?>
    <!-- Return to Top -->
	<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <?php
	}
}
add_action( 'wp_footer', 'educationpress_add_scroll_to_top_link', 100 );


function educationpress_coursepress_signup_url()
{
	if( class_exists( 'CoursePress_Core' ) )
	{
		global $signup_url;
		$signup_url = CoursePress_Core::get_slug( 'signup', true );
	}

}
add_action( 'init', 'educationpress_coursepress_signup_url' );


function educationpress_set_search_course( $query ) {
	
	if( !empty( $_GET['s'] ) && $query->is_main_query() && !empty( $_GET['post-type'] ) && $_GET['post-type']  == 'course')
		$query->set( 'post_type',  'course'  );
		
	return $query;
}
add_action( 'pre_get_posts', 'educationpress_set_search_course' );
add_action('init', 'educationpress_custom_rewrite_basic');
function educationpress_custom_rewrite_basic() {
	$slug = class_exists( 'CoursePress_Core' ) ? CoursePress_Core::get_slug( 'instructor' ) : 'instructor';
	add_rewrite_tag('%instructor%','([^/]*)');
	add_rewrite_rule('^'.$slug.'/([^/]*)/?', 'index.php?instructor=$matches[1]', 'top');
	
	if( class_exists( 'CoursePress_Core' ) )
	{
		global $course_slug;
		$course_slug = CoursePress_Core::get_slug( 'course' );
	}
	
}

add_filter( 'query_vars', 'edupress_university_query_vars' );
function edupress_university_query_vars( $query_vars )
{
	//in all theme mode
	$query_vars[] = 'instructor';
	return $query_vars;
}

remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');

add_filter( 'template_include', 'educationpress_instructor_page_template', 99 );
function educationpress_instructor_page_template( $template ) {

	if( get_query_var('instructor') ) {
	
		$new_template = locate_template( array( 'single-instructor.php' ) );
		
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}
	return $template;
}

//Total enroll add
add_action( 'save_post_course', 'educationpress_save_course' );
function educationpress_save_course( $post_id ) {

		$total_enroll = get_post_meta( $post_id, 'total_enroll', true );
		if( empty($total_enroll) )
		{
			add_post_meta($post_id, 'total_enroll', 0, $unique=true); 	
		}
    //save stuff
}

add_action('coursepress_template_dashboard_page', 'educationpress_coursepress_template_dashboard_page');
function educationpress_coursepress_template_dashboard_page( $template )
{
	$new_template = '<div id="no-more-tables">'.$template.'</div>';
	return $new_template;
}


/**
 * WooCommerce related functions for ecommerce theme mode
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once( get_template_directory() . '/inc/woo-setup.php' );
}
if ( in_array( 'wordpress-social-login/wp-social-login.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {	
	require_once( get_template_directory() . '/inc/social-login-setup.php' );
}


if( in_array( 'google-captcha/google-captcha.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists( 'gglcptch_display' )  )
{
	function educationpress_comment_captcha_init()
	{
		remove_action( 'comment_form_after_fields', 'gglcptch_commentform_display' );
		remove_action( 'comment_form_logged_in_after', 'gglcptch_commentform_display' );
		add_filter( 'comment_form_submit_field', 'educationpress_filter_comment_form_submit_field', 90 );
		
		function educationpress_filter_comment_form_submit_field( $field_output )
		{
			$output = '';
			
			if ( !gglcptch_check_role() )
			{
				$output .= gglcptch_display();
			}
			$output .= $field_output;
			return $output;
		}
	}
	add_action( 'init', 'educationpress_comment_captcha_init' , 30 );
		
}

if ( !is_user_logged_in() && !is_singular( 'course' )
&& in_array( 'google-captcha/google-captcha.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && function_exists( 'gglcptch_display' )  && class_exists('CoursePress_Core')) {
	global $gglcptch_options;
	if ( empty( $gglcptch_options ) )
		register_gglcptch_settings();
		
		
	if( $gglcptch_options['login_form'] )
	{
		add_action( 'coursepress_form_fields', 'educationpress_gglcptch_display', 10 );
		add_action( 'coursepress_form_fields', 'gglcptch_display', 10 );
	}
	if( $gglcptch_options['registration_form'] )
	{
		add_action( 'coursepress_after_all_signup_fields', 'educationpress_gglcptch_display', 10 );
	}
	
	/*
	add_action( 'coursepress_form_fields', 'educationpress_gglcptch_display', 10 );
	add_action( 'coursepress_after_all_signup_fields', 'educationpress_gglcptch_display', 10 );
	
	add_action( 'coursepress_before_login_form', 'gglcptch_recaptcha_check' );
	add_action( 'coursepress_before_signup_form', 'gglcptch_recaptcha_check' );
	*/
	if( !function_exists('educationpress_gglcptch_display') )
	{
		function educationpress_gglcptch_display(){
			gglcptch_recaptcha_check();
			?>
            <div class="recaptcha_container">
            <?php
			echo gglcptch_display();
			?>
            </div>
            <?php	
		}
	}
	
	add_action( 'coursepress_before_signup_form', 'educationpress_verify_captcha', 20 );
	add_action( 'coursepress_before_login_form', 'educationpress_verify_captcha', 20 );
	
	
	if( !function_exists('educationpress_verify_captcha') )
	{
		function educationpress_verify_captcha(){
			if( isset( $_POST['wp-submit'] ) )
			{
				
				if (  !isset($_POST["g-recaptcha-response"]) || empty( $_POST["g-recaptcha-response"] ) ) {
					?><br />
					<p class="form-info-red">
					<?php
					esc_html_e('Please enter reCAPTCHA value', 'educationpress');
					?>
					</p>
					<?php
					add_filter( 'cp_course_signup_form_show_messages', '__return_false' );
				}
				else
				{
					$gglcptch_remote_addr = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP );
					global $gglcptch_options;
	
	
					if ( empty( $gglcptch_options ) )
						register_gglcptch_settings();
			
					$publickey	= $gglcptch_options['public_key'];
					$privatekey	= $gglcptch_options['private_key'];
	
					$resp = gglcptch_get_response( $privatekey, $gglcptch_remote_addr );
					if ( !$resp['success'] ) { /* the CAPTCHA answer is right */
						add_filter( 'cp_course_signup_form_show_messages', '__return_false' );
						?>
						<p class="form-info-red">
						<?php
						esc_html_e('Error: You have entered an incorrect reCAPTCHA value', 'educationpress');
						?>
						</p>
						<?php
					}
				}
			}
	}
	}
}

