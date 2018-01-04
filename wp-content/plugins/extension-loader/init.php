<?php
/**
 * Version 0.0.3
 *
 * This file is just an example you can copy it to your theme and modify it to fit your own needs.
 * Watch the paths though.
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {

	require_once( dirname( __FILE__ ) . '/importer/radium-importer.php' ); //load admin theme data importer

	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

		/**
		 * Set framewok
		 *
		 * options that can be used are 'default', 'radium' or 'optiontree'
		 *
		 * @since 0.0.3
		 *
		 * @var string
		 */
		public $theme_options_framework = 'redux';

		/**
		 * Holds a copy of the object for easy reference.
		 *
		 * @since 0.0.1
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Set the key to be used to store theme options
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $theme_option_name       = 'educationpress_options'; //set theme options name here (key used to save theme options). Optiontree option name will be set automatically

		/**
		 * Set name of the theme options file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $theme_options_file_name = 'theme_options.txt';

		/**
		 * Set name of the widgets json file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widgets_file_name       = 'widgets.json';

		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $content_demo_file_name  = 'content.xml';

		/**
		 * Holds a copy of the widget settings
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widget_import_results;

		/**
		 * Constructor. Hooks all interactions to initialize the class.
		 *
		 * @since 0.0.1
		 */
		public function __construct() {

			$this->demo_files_path = dirname(__FILE__) . '/demo-files/'; //can

			self::$instance = $this;
			parent::__construct();

		}

		/**
		 * Add menus - the menus listed here largely depend on the ones registered in the theme
		 *
		 * @since 0.0.1
		 */
		public function set_demo_menus(){

			// Menus to Import and assign - you can remove or add as many as you want
			$visitor_menu    = get_term_by('name', 'Visitor Menu', 'nav_menu');
			$logged_in_menu   = get_term_by('name', 'Logged In Menu', 'nav_menu');
			//$footer_menu = get_term_by('name', 'Main Menu', 'nav_menu');

			set_theme_mod( 'nav_menu_locations', array(
					'primary' => $logged_in_menu->term_id,
					'visiter' => $visitor_menu->term_id,
					//'footer-menu' => $footer_menu->term_id
				)
			);

			$this->flag_as_imported['menus'] = true;

		}

	}

	new Radium_Theme_Demo_Data_Importer;

}


function educationpress_radium_import_end() {
	$page = get_page_by_title( 'Home Page 1' );
	if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );
				$cat1=get_term_by('name', 'Sports', 'course_category');
				$cat2=get_term_by('name', 'Food Recipe', 'course_category');
				$cat3=get_term_by('name', 'Web Development', 'course_category');
				$cat4=get_term_by('name', 'Music', 'course_category');
				$cat5=get_term_by('name', 'Frontend', 'course_category');
				$cat6=get_term_by('name', 'Multi Language', 'course_category');
				$course_cat[]=  (int) $cat1->term_id;
				$course_cat[]=  (int) $cat2->term_id;
				$course_cat[]=  (int) $cat3->term_id;
				$course_cat[]=  (int) $cat4->term_id;
				$course_cat[]=  (int) $cat5->term_id;
				$course_cat[]=  (int) $cat6->term_id;
				
				update_term_meta( (int) $cat1->term_id, 'tc_cp_cat_short_text', 'Lorem Ipsum is simply dummy text of the printing and dolor site amet dolor.' );
				update_term_meta( (int) $cat2->term_id, 'tc_cp_cat_short_text', 'Maecenas cursus mauris libero, a imperdiet enim pellentesque id.' );
				update_term_meta( (int) $cat3->term_id, 'tc_cp_cat_short_text', 'Maecenas cursus mauris libero, a imperdiet enim pellentesque id. Aliquam erat volutpat Lorem Ipsum is simply dummy.' );
				update_term_meta( (int) $cat4->term_id, 'tc_cp_cat_short_text', 'Make a type specimen book.' );
			    update_term_meta( (int) $cat5->term_id, 'tc_cp_cat_short_text', 'Make a type specimen book.' );
			    update_term_meta( (int) $cat6->term_id, 'tc_cp_cat_short_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' );
				
				$panels_data = get_post_meta( $page->ID, 'panels_data', true );
				$panels_data['widgets'][3]['course_cat']=$course_cat;
				update_post_meta( $page->ID, 'panels_data', $panels_data );
				
				$role = get_role( 'administrator' );
				$role->add_cap( 'read' );
				
				// Add ALL instructor capabilities
				$admin_capabilities = array_keys( CoursePress_Data_Capabilities::$capabilities['instructor'] );
				foreach ( $admin_capabilities as $cap ) {
				$role->add_cap( $cap );
				}
				
				CoursePress_Data_Capabilities::drop_private_caps( '', $role );
				
				update_user_meta( 1, 'role_ins', 'instructor' );
				update_user_meta( 1, 'role', 'student' );
				update_user_meta( 1, 'job_title', "Head In Nichola's Sports Academy" );
				update_user_meta( 1, 'mob_num', '9999919293' );
				update_user_meta( 1, 'facebook_url', 'http://facebook.com' );
				update_user_meta( 1, 'twitter_url', 'http://twitter.com' );
				update_user_meta( 1, 'google_plus_url', 'http://google.com' );
				update_user_meta(1, 'linkedin_url', 'http://linkedin.com' );
				update_user_meta( 1, 'pinterest_url', 'http://pinterest.com' );
				update_user_meta(1, 'instagram_url', 'http://instagram.com' );
				update_user_meta( 1, 'youtube_url', 'http://youtube.com' );
				
				update_user_meta( 1, 'course_783', '783' );
				update_user_meta(1, 'course_231', '231' );
				update_user_meta( 1, 'course_248', '248' );
				update_user_meta( 1, 'course_264', '264' );
				update_user_meta(1, 'course_306', '306' );
				update_user_meta( 1, 'course_329', '329' );
				update_user_meta( 1, 'course_343', '343' );
				update_user_meta(1, 'course_359', '359' );
				
				update_user_meta( 1, 'enrolled_course_date_783', '2016-03-18 11:11:46' );
				update_user_meta( 1, 'enrolled_course_class_783', '' );
				update_user_meta( 1, 'enrolled_course_group_783', '' );
				
				
				update_user_meta( 1, 'course_385', '385' );
				update_user_meta(1, 'course_402', '402' );
				
				update_user_meta( 1, 'enrolled_course_date_402', '2016-03-21 07:09:44' );
				update_user_meta( 1, 'enrolled_course_class_402', '' );
				update_user_meta( 1, 'enrolled_course_group_402', '' );
				
				
				update_user_meta( 1, 'course_425', '425' );
				update_user_meta(1, 'course_469', '469' );
				update_user_meta(1, 'course_483', '483' );
				update_user_meta( 1, 'course_453', '453' );
				update_user_meta(1, 'course_501', '501' );
				update_user_meta(1, 'course_157', '157' );
				

				
				
				
				
				
				$userdata2 = array(
				'user_login'  =>  'themecycledemo',
				'user_email' =>  '	themecycledemo@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'emmawilson',
				'display_name' => 'Emma Wilson',
				'first_name' => 'Theme Cycle',
				'last_name' => 'Demo',
				);
				
				$user_id = wp_insert_user( $userdata2 ) ;
				
				$userdata3 = array(
				'user_login'  =>  'emmawilson',
				'user_email' =>  'emmawilson008@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'emmawilson',
				'display_name' => 'Emma Wilson',
				'first_name' => 'Emma',
				'last_name' => 'Wilson',
				);
				$user_id3 = wp_insert_user( $userdata3 ) ;
				update_user_meta( $user_id3, 'role', 'student' );
				
				
				update_user_meta( $user_id3, 'enrolled_course_date_284', '2016-03-23 14:57:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_284', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_284', '' );
				
				update_user_meta( $user_id3, 'enrolled_course_date_516', '2016-03-23 14:58:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_516', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_516', '' );
				
				
				update_user_meta( $user_id3, 'enrolled_course_date_501', '2016-03-23 15:45:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_501', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_501', '' );
				
				update_user_meta( $user_id3, 'enrolled_course_date_587', '2016-03-23 15:27:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_587', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_587', '' );
				
				update_user_meta( $user_id3, 'enrolled_course_date_601', '2016-03-23 15:43:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_601', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_601', '' );
				
				
				update_user_meta( $user_id3, 'enrolled_course_date_536', '2016-03-23 15:32:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_536', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_536', '' );
				
				update_user_meta( $user_id3, 'enrolled_course_date_569', '2016-03-23 15:57:53' );
				update_user_meta( $user_id3, 'enrolled_course_class_569', '' );
				update_user_meta( $user_id3, 'enrolled_course_group_569', '' );
				
				
				
				$userdata4 = array(
				'user_login'  =>  'stevedown',
				'user_email' =>  'stevedown00@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'stevedown',
				'display_name' => 'Steve Down',
				'first_name' => 'Steve',
				'last_name' => 'Down',
				'nickname' => 'stevedown',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet nulla sed neque congue pharetra sed sed leo. Pellentesque elementum porttitor libero hendrerit porta. Aenean vitae odio semper, iaculis nibh non, hendrerit augue. Nam non tincidunt justo, eu fermentum nulla',
				'rich_editing' => 'true',
				'comment_shortcuts' => 'false',
				'admin_color' => 'fresh',
				'use_ssl' => '0',
				'show_admin_bar_front' => 'true',
				'dismissed_wp_pointers' => '',
				);
				$user_id4 = wp_insert_user( $userdata4 ) ;
				update_user_meta( $user_id4, 'role_ins', 'instructor' );
				
				update_user_meta( $user_id4, 'job_title', 'Android, IOS & Web Developer' );
				update_user_meta( $user_id4, 'mob_num', '9999919293' );
				update_user_meta( $user_id4, 'facebook_url', 'http://facebook.com' );
				update_user_meta( $user_id4, 'twitter_url', 'http://twitter.com' );
				update_user_meta( $user_id4, 'google_plus_url', 'http://google.com' );
				update_user_meta( $user_id4, 'linkedin_url', 'http://linkedin.com' );
				update_user_meta( $user_id4, 'pinterest_url', 'http://pinterest.com' );
				update_user_meta( $user_id4, 'instagram_url', 'http://instagram.com' );
				update_user_meta( $user_id4, 'youtube_url', 'http://youtube.com' );
				update_user_meta( $user_id4, 'course_569', '569' );
				update_user_meta( $user_id4, 'course_548', '548' );
				$default = array_keys( CoursePress_Data_Capabilities::$capabilities['instructor'], 1 );

				$instructor_capabilities = get_option( 'coursepress_instructor_capabilities', $default );

				$role = new WP_User( $user_id4 );


				$role->add_cap( 'can_edit_posts' );
				$role->add_cap( 'read' );
				$role->add_cap( 'upload_files' );

				foreach ( $instructor_capabilities as $cap ) {
					$role->add_cap( $cap );
				}
				
				$userdata5 = array(
				'user_login'  =>  'Joneslee',
				'user_email' =>  'Joneslee500@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'Joneslee',
				'display_name' => 'Jones Lee',
				'first_name' => 'Jones',
				'last_name' => 'Lee',
				'nickname' => 'Joneslee'
				);
				
				$user_id5 = wp_insert_user( $userdata5 ) ;
				update_user_meta( $user_id5, 'role', 'student' );
				
				
				update_user_meta( $user_id5, 'enrolled_course_date_157', '2016-03-23 14:57:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_157', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_157', '' );
				
				update_user_meta( $user_id5, 'enrolled_course_date_516', '2016-03-23 14:58:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_516', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_516', '' );
				
				update_user_meta( $user_id5, 'enrolled_course_date_453', '2016-03-23 14:58:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_453', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_453', '' );
				
				
				update_user_meta( $user_id5, 'enrolled_course_date_501', '2016-03-23 15:45:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_501', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_501', '' );
				
				
				update_user_meta( $user_id5, 'enrolled_course_date_548', '2016-03-23 15:43:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_548', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_548', '' );
				
				
				update_user_meta( $user_id5, 'enrolled_course_date_536', '2016-03-23 15:32:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_536', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_536', '' );
				
				update_user_meta( $user_id5, 'enrolled_course_date_569', '2016-03-23 15:57:53' );
				update_user_meta( $user_id5, 'enrolled_course_class_569', '' );
				update_user_meta( $user_id5, 'enrolled_course_group_569', '' );
				
				
				
				$userdata6 = array(
				'user_login'  =>  'cherrywalker',
				'user_email' =>  'cherrywalker00@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'cherrywalker',
				'display_name' => 'Cherry Walker',
				'first_name' => 'Cherry',
				'last_name' => 'Walker',
				'nickname' => 'cherrywalker'
				);
				
				$user_id6 = wp_insert_user( $userdata6 ) ;
				update_user_meta( $user_id6, 'role', 'student' );
				
				
				update_user_meta( $user_id6, 'enrolled_course_date_284', '2016-03-23 14:57:53' );
				update_user_meta( $user_id6, 'enrolled_course_class_284', '' );
				update_user_meta( $user_id6, 'enrolled_course_group_284', '' );
				
				
				update_user_meta( $user_id6, 'enrolled_course_date_453', '2016-03-23 14:58:53' );
				update_user_meta( $user_id6, 'enrolled_course_class_453', '' );
				update_user_meta( $user_id6, 'enrolled_course_group_453', '' );
				
				
				update_user_meta( $user_id6, 'enrolled_course_date_501', '2016-03-23 15:45:53' );
				update_user_meta( $user_id6, 'enrolled_course_class_501', '' );
				update_user_meta( $user_id6, 'enrolled_course_group_501', '' );
				
				
				
				update_user_meta( $user_id6, 'enrolled_course_date_536', '2016-03-23 15:32:53' );
				update_user_meta( $user_id6, 'enrolled_course_class_536', '' );
				update_user_meta( $user_id6, 'enrolled_course_group_536', '' );
				
				update_user_meta( $user_id6, 'enrolled_course_date_569', '2016-03-23 15:57:53' );
				update_user_meta( $user_id6, 'enrolled_course_class_569', '' );
				update_user_meta( $user_id6, 'enrolled_course_group_569', '' );
				
				
				$userdata7 = array(
				'user_login'  =>  'jamesbond',
				'user_email' =>  'jamesbond100008@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'jamesbond',
				'display_name' => 'James Bond',
				'first_name' => 'James',
				'last_name' => 'Bond',
				'nickname' => 'jamesbond'
				);
				
				$user_id7 = wp_insert_user( $userdata7 ) ;
				update_user_meta( $user_id7, 'role_ins', 'instructor' );
				
				
				update_user_meta( $user_id7, 'job_title', 'UX Designer' );
				update_user_meta( $user_id7, 'mob_num', '9999919293' );
				update_user_meta( $user_id7, 'facebook_url', 'http://facebook.com' );
				update_user_meta( $user_id7, 'twitter_url', 'http://twitter.com' );
				update_user_meta( $user_id7, 'google_plus_url', 'http://google.com' );
				update_user_meta( $user_id7, 'linkedin_url', 'http://linkedin.com' );
				update_user_meta( $user_id7, 'pinterest_url', 'http://pinterest.com' );
				update_user_meta( $user_id7, 'instagram_url', 'http://instagram.com' );
				update_user_meta( $user_id7, 'youtube_url', 'http://youtube.com' );
				update_user_meta( $user_id7, 'course_601', '601' );
				update_user_meta( $user_id7, 'course_587', '587' );
				update_user_meta( $user_id7, 'course_516', '516' );
				
				$default = array_keys( CoursePress_Data_Capabilities::$capabilities['instructor'], 1 );

				$instructor_capabilities = get_option( 'coursepress_instructor_capabilities', $default );

				$role = new WP_User( $user_id7 );


				$role->add_cap( 'can_edit_posts' );
				$role->add_cap( 'read' );
				$role->add_cap( 'upload_files' );

				foreach ( $instructor_capabilities as $cap ) {
					$role->add_cap( $cap );
				}
				
				
			
				$userdata8 = array(
				'user_login'  =>  'josefermola',
				'user_email' =>  'josefermola95@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'josefermola',
				'display_name' => 'Josef Ermola',
				'first_name' => 'Josef',
				'last_name' => 'Ermola',
				'nickname' => 'josefermola'
				);
				
				$user_id8 = wp_insert_user( $userdata8 ) ;
				update_user_meta( $user_id8, 'role', 'student' );
				
				
				update_user_meta( $user_id8, 'enrolled_course_date_284', '2016-03-23 14:57:53' );
				update_user_meta( $user_id8, 'enrolled_course_class_284', '' );
				update_user_meta( $user_id8, 'enrolled_course_group_284', '' );
				
				
				update_user_meta( $user_id8, 'enrolled_course_date_157', '2016-03-23 14:58:53' );
				update_user_meta( $user_id8, 'enrolled_course_class_157', '' );
				update_user_meta( $user_id8, 'enrolled_course_group_157', '' );
				
				
				update_user_meta( $user_id8, 'enrolled_course_date_601', '2016-03-23 15:45:53' );
				update_user_meta( $user_id8, 'enrolled_course_class_601', '' );
				update_user_meta( $user_id8, 'enrolled_course_group_601', '' );
				
				
				
				update_user_meta( $user_id8, 'enrolled_course_date_548', '2016-03-23 15:32:53' );
				update_user_meta( $user_id8, 'enrolled_course_class_548', '' );
				update_user_meta( $user_id8, 'enrolled_course_group_548', '' );
				
			
				
				
				
					
				$userdata9 = array(
				'user_login'  =>  'terrencetillman878',
				'user_email' =>  'terrencetillman878@gmail.com',
				'user_pass'   =>  '12345',  // When creating an user, `user_pass` is expected.
				'user_nicename' => 'terrencetillman878',
				'display_name' => 'Terrence Tillman',
				'first_name' => 'Terrence',
				'last_name' => 'Tillman',
				'nickname' => 'terrencetillman878'
				);
				
				$user_id9 = wp_insert_user( $userdata9 ) ;
				update_user_meta( $user_id9, 'role_ins', 'instructor' );
				
				
				update_user_meta( $user_id9, 'job_title', 'Web Apps Developer' );
				update_user_meta( $user_id9, 'mob_num', '9999919293' );
				update_user_meta( $user_id9, 'facebook_url', 'http://facebook.com' );
				update_user_meta( $user_id9, 'twitter_url', 'http://twitter.com' );
				update_user_meta( $user_id9, 'google_plus_url', 'http://google.com' );
				update_user_meta( $user_id9, 'linkedin_url', 'http://linkedin.com' );
				update_user_meta( $user_id9, 'pinterest_url', 'http://pinterest.com' );
				update_user_meta( $user_id9, 'instagram_url', 'http://instagram.com' );
				update_user_meta( $user_id9, 'youtube_url', 'http://youtube.com' );
				update_user_meta( $user_id9, 'course_569', '569' );
				update_user_meta( $user_id9, 'course_587', '587' );
				update_user_meta( $user_id9, 'course_536', '536' );
				update_user_meta( $user_id9, 'course_284', '284' );
				
				$default = array_keys( CoursePress_Data_Capabilities::$capabilities['instructor'], 1 );

				$instructor_capabilities = get_option( 'coursepress_instructor_capabilities', $default );

				$role = new WP_User( $user_id9 );


				$role->add_cap( 'can_edit_posts' );
				$role->add_cap( 'read' );
				$role->add_cap( 'upload_files' );

				foreach ( $instructor_capabilities as $cap ) {
					$role->add_cap( $cap );
				}
				
				
				update_option( 'coursepress_student_dashboard_page', '137' );
				update_option( 'coursepress_student_settings_page', '139' );
				update_option( 'display_menu_items', '' );	
				update_option( 'course_image_width', 360 );
				update_option( 'course_image_height', 270 );
				update_option( 'redirect_mp_to_course', 1 );
				
				$rr_opt=get_option( 'rr_options');
				$rr_opt['form-email-require']='checked';
				$rr_opt['snippet_stars']='checked';
				$rr_opt['reviews_order']='DESC';
				update_option( 'rr_options', $rr_opt );
				$wpq2_richreviews = array(
  array('date_time' => '2016-03-23 08:43:23','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'End Of Course Not Good As Start','review_rating' => '1','review_text' => 'Very good course! I only wish that the instructor breaks/runs down the code as he did in the previous lectures','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '516','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:39:46','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Great Assets','review_rating' => '4','review_text' => 'Regardless of whether you\'re a complete beginner or a experienced with other languages, you\'ll find this course to be a great asset, I think.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '284','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:41:48','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Set Limits.','review_rating' => '2','review_text' => 'Really good, but it would be better if you went deeper into Baseball','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '157','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:36:50','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'Nice Content','review_rating' => '5','review_text' => 'This course is packed full of very relevant content and is regularly updated with new videos. Tim does a great job in all his videos.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '284','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:44:11','reviewer_name' => 'Cherry Walker','reviewer_email' => 'cherrywalker00@gmail.com','review_title' => 'Well Explain','review_rating' => '5','review_text' => 'Well explained and easy to understand!','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '501','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:45:06','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'Detailed Content','review_rating' => '5','review_text' => 'This class is very good and detailed. The instructor\'s accent is a little bit strong, but it is still understandable.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '501','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:46:01','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Interested','review_rating' => '4','review_text' => 'Great teacher and excellent course. I recommend it to everyone interested in this.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '501','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:46:01','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Interested','review_rating' => '4','review_text' => 'Great teacher and excellent course. I recommend it to everyone interested in this.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '501','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:47:03','reviewer_name' => 'Cherry Walker','reviewer_email' => 'cherrywalker00@gmail.com','review_title' => 'Depth In Course','review_rating' => '5','review_text' => 'Very good and in-depth course. Would recommend to anyone who\'s interested to learn Java. Also, Teacher\'s comments are often fun to listen to and he provides nice examples and problems that relate to real life implementation.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '453','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:48:53','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Not For Beginners','review_rating' => '2','review_text' => 'This is not for beginners. It may require foreplay','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '453','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:50:25','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'Covers Great Scope','review_rating' => '5','review_text' => 'The way the course is taught is excellent. It is up to date, simple to understand, highly informative and covers a great scope from beginner to intermediate levels. Highly recommend to anyone wanting to have a great base understanding of HTML5 if they have never studied before or to revise your current skills.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '536','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:51:20','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Far From Beginners','review_rating' => '1','review_text' => 'not much new to start. so far for beginners.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '536','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:52:58','reviewer_name' => 'Josef Ermola','reviewer_email' => 'josefermola95@gmail.com','review_title' => 'Comfortable','review_rating' => '5','review_text' => 'So far, the best Java course on This Site. I recommend this course to anyone who wants to get comfortable with IOS in very short time. Great job, Sir! 5 Stars for your work! Congrat','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '548','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:53:51','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Command Over the Subject','review_rating' => '4','review_text' => 'The Instructor has command over the subject. His explanations are clear and illustrations are simplified','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '548','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:55:44','reviewer_name' => 'Cherry Walker','reviewer_email' => 'cherrywalker00@gmail.com','review_title' => 'Bit Slow','review_rating' => '4','review_text' => 'the course can get a bit slow, when Teacher rather writes a program for some minutes and then, and only then goes to explain an aspect of the program.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '569','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:57:13','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'Loud And Noise','review_rating' => '2','review_text' => 'The voice recording was too loud and having lot of Noise','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '569','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:58:00','reviewer_name' => 'Jones Lee','reviewer_email' => 'Joneslee500@gmail.com','review_title' => 'Quite Informative Only','review_rating' => '3','review_text' => 'yes the content is quite informative.And also the instructor\'s delivery is vey engaging and easy to understand.Thankyou so much for this course','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '569','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:59:16','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'Step By Step','review_rating' => '5','review_text' => 'simple, easy & step by step course. I wish the author comes with the second part for android course,','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '587','review_category' => 'post'),
  array('date_time' => '2016-03-23 08:59:16','reviewer_name' => 'Emma Vilson','reviewer_email' => 'emmawilson008@gmail.com','review_title' => 'Step By Step','review_rating' => '5','review_text' => 'simple, easy & step by step course. I wish the author comes with the second part for android course,','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '587','review_category' => 'post'),
  array('date_time' => '2016-03-23 09:00:18','reviewer_name' => 'Josef Ermola','reviewer_email' => 'josefermola95@gmail.com','review_title' => 'Clear Explaination','review_rating' => '5','review_text' => 'Excellent course. The concepts are clearly explained. This course is as good or better than an Android course I\'m taking at a local college.','review_status' => '1','reviewer_ip' => '27.109.26.233','post_id' => '601','review_category' => 'post')
);

			global $wpdb,$richReviews;
			for($i=0; $i<count($wpq2_richreviews); $i++) 
			{
	
				$wpdb->insert($richReviews->sqltable, $wpq2_richreviews[$i]);
			}
			
			
			
				
			$post_args1 = array(
			'order'          => 'ASC',
			'post_type'      => 'course',
			'post_status'    => 'publish',
			'posts_per_page' =>  -1,
			);
			$courses = get_posts( $post_args1 );
			if ( count( $courses)>0 ) :
				foreach ( $courses as $inscou )
				{
					if(get_post_meta( $inscou->ID, 'featured_url', true )!='')
					{
					$cou_feaurl=get_post_meta( $inscou->ID, 'featured_url', true );
					$cou_feaurl=str_replace("http://www.demos.themecycle.com/educationpress",site_url(),$cou_feaurl);
					update_post_meta( $inscou->ID, 'featured_url', $cou_feaurl );
					}
					if(get_post_meta( $inscou->ID, '_thumbnail_id', true )!='')
					{
					$thum_url=get_post_meta( $inscou->ID, '_thumbnail_id', true );
					$thum_url=str_replace("http://www.demos.themecycle.com/educationpress",site_url(),$thum_url);
					update_post_meta( $inscou->ID, '_thumbnail_id', $thum_url );
					}
				}
			endif;
			
			delete_post_meta( 88, 'EDU_PRESS_gallery' );
			add_post_meta( 88, 'EDU_PRESS_gallery', 791 , false);
			add_post_meta( 88, 'EDU_PRESS_gallery', 785 , false);
			update_post_meta( 686, 'EDU_PRESS_gallery', 784 );
			
			$my_post = array(
			'ID'           => 569,
			'post_date_gmt'   => date('Y-m-d H:i:s'),
			'post_date' => date('Y-m-d H:i:s'),
			);
			
			// Update the post into the database
			wp_update_post( $my_post );
				
			
            }
	
	$page = get_page_by_title( 'Home Page 3' );
	if ( isset( $page->ID ) ) {
				$cat1=get_term_by('name', 'Sports', 'course_category');
				$cat2=get_term_by('name', 'Food Recipe', 'course_category');
				$cat3=get_term_by('name', 'Web Development', 'course_category');
				$cat4=get_term_by('name', 'Music', 'course_category');
				$cat5=get_term_by('name', 'Frontend', 'course_category');
				$cat6=get_term_by('name', 'Multi Language', 'course_category');
				$course_cat1[]=  (int) $cat1->term_id;
				$course_cat1[]=  (int) $cat2->term_id;
				$course_cat1[]=  (int) $cat3->term_id;
				$course_cat1[]=  (int) $cat6->term_id;
				$course_cat1[]=  (int) $cat4->term_id;
				$course_cat1[]=  (int) $cat5->term_id;
				
				$panels_data = get_post_meta( $page->ID, 'panels_data', true );
				$panels_data['widgets'][0]['course_cat']=$course_cat1;
				update_post_meta( $page->ID, 'panels_data', $panels_data );


			}
			
	$page = get_page_by_title( 'Blog' );
	if ( isset( $page->ID ) ) {
		update_option( 'page_for_posts', $page->ID );
	}		
			
}
add_action( 'radium_import_end', 'educationpress_radium_import_end' );  



