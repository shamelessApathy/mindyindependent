<?php
/**
 *
 * @link              http://themeforest.net/user/ThemeCycle
 * @since             1.2
 * @package          EducationPress
 *
 * @wordpress-plugin
 * Plugin Name:       ThemeCycle Extensions
 * Plugin URI:        http://ThemeCycle.com/
 * Description:       ThemeCycle Extensions plugin provides blog post post format , testimonial post type and event post type with related functionality.
 * Version:           1.2
 * Author:            Ahmed
 * Author URI:        http://themeforest.net/user/ThemeCycle
 * Text Domain:       edupress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


function themecycle_extention_custom_init() {
	
     $labels = array(
            'name'                => _x( 'Testimonials', 'Post Type General Name', 'themecycle-exten' ),
            'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'themecycle-exten' ),
            'menu_name'           => __( 'Testimonials', 'themecycle-exten' ),
            'name_admin_bar'      => __( 'Testimonial', 'themecycle-exten' ),
            'parent_item_colon'   => __( 'Parent Testimonial:', 'themecycle-exten' ),
            'all_items'           => __( 'All Testimonials', 'themecycle-exten' ),
            'add_new_item'        => __( 'Add New Testimonial', 'themecycle-exten' ),
            'add_new'             => __( 'Add New', 'themecycle-exten' ),
            'new_item'            => __( 'New Testimonial', 'themecycle-exten' ),
            'edit_item'           => __( 'Edit Testimonials', 'themecycle-exten' ),
            'update_item'         => __( 'Update Testimonial', 'themecycle-exten' ),
            'view_item'           => __( 'View Testimonial', 'themecycle-exten' ),
            'search_items'        => __( 'Search Testimonial', 'themecycle-exten' ),
            'not_found'           => __( 'Not found', 'themecycle-exten' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'themecycle-exten' ),
        );

        $args = array(
            'label'               => __( 'Testimonials', 'themecycle-exten' ),
            'description'         => __( 'Testimonials', 'themecycle-exten' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-groups',
            'show_in_admin_bar'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );
		

        register_post_type( 'testimonials', $args );
		
		 $labels = array(
            'name'                => _x( 'Events', 'Post Type General Name', 'themecycle-exten' ),
            'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'themecycle-exten' ),
            'menu_name'           => __( 'Events', 'themecycle-exten' ),
            'name_admin_bar'      => __( 'Event', 'themecycle-exten' ),
            'parent_item_colon'   => __( 'Parent Event:', 'themecycle-exten' ),
            'all_items'           => __( 'All Events', 'themecycle-exten' ),
            'add_new_item'        => __( 'Add New Event', 'themecycle-exten' ),
            'add_new'             => __( 'Add New', 'themecycle-exten' ),
            'new_item'            => __( 'New Event', 'themecycle-exten' ),
            'edit_item'           => __( 'Edit Event', 'themecycle-exten' ),
            'update_item'         => __( 'Update Event', 'themecycle-exten' ),
            'view_item'           => __( 'View Event', 'themecycle-exten' ),
            'search_items'        => __( 'Search Event', 'themecycle-exten' ),
            'not_found'           => __( 'Not found', 'themecycle-exten' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'themecycle-exten' ),
        );

        $rewrite = array(
            'slug'                => __( 'events', 'themecycle-exten' ),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        );

        $args = array(
            'label'               => __( 'event', 'themecycle-exten' ),
            'description'         => __( 'Event', 'themecycle-exten' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-calendar',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );
		
		
        register_post_type( 'event', $args );
		
		 $gallery_labels = array(
            'name'                => _x( 'Galleries', 'Post Type General Name', 'themecycle-exten' ),
            'singular_name'       => _x( 'Gallery', 'Post Type Singular Name', 'themecycle-exten' ),
            'menu_name'           => __( 'Galleries', 'themecycle-exten' ),
            'name_admin_bar'      => __( 'Gallery', 'themecycle-exten' ),
            'parent_item_colon'   => __( 'Parent Gallery:', 'themecycle-exten' ),
            'all_items'           => __( 'All Galleries', 'themecycle-exten' ),
            'add_new_item'        => __( 'Add New Gallery', 'themecycle-exten' ),
            'add_new'             => __( 'Add New', 'themecycle-exten' ),
            'new_item'            => __( 'New Gallery', 'themecycle-exten' ),
            'edit_item'           => __( 'Edit Gallery', 'themecycle-exten' ),
            'update_item'         => __( 'Update Gallery', 'themecycle-exten' ),
            'view_item'           => __( 'View Gallery', 'themecycle-exten' ),
            'search_items'        => __( 'Search Gallery', 'themecycle-exten' ),
            'not_found'           => __( 'Not found', 'themecycle-exten' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'themecycle-exten' ),
        );
		$rewrite = array(
            'slug'                => __( 'gallery', 'themecycle-exten' ),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        );
		 $gallery_args = array(
            'label'               => __( 'gallery', 'themecycle-exten' ),
            'description'         => __( 'Gallery Description', 'themecycle-exten' ),
            'labels'              => $gallery_labels,
            'supports'            => array( 'title'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 7,
            'menu_icon'           => 'dashicons-format-gallery',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );
		register_post_type('gallery', $gallery_args);
		
		
		$labels = array(
            'name'                       => _x( 'Category', 'Taxonomy General Name', 'themecycle-exten' ),
            'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'themecycle-exten' ),
            'menu_name'                  => __( 'Categories', 'themecycle-exten' ),
            'all_items'                  => __( 'All Categories', 'themecycle-exten' ),
            'parent_item'                => __( 'Parent Category', 'themecycle-exten' ),
            'parent_item_colon'          => __( 'Parent Category:', 'themecycle-exten' ),
            'new_item_name'              => __( 'New Category', 'themecycle-exten' ),
            'add_new_item'               => __( 'Add New Category', 'themecycle-exten' ),
            'edit_item'                  => __( 'Edit Category', 'themecycle-exten' ),
            'update_item'                => __( 'Update Category', 'themecycle-exten' ),
            'view_item'                  => __( 'View Category', 'themecycle-exten' ),
            'separate_items_with_commas' => __( 'Separate Categories with commas', 'themecycle-exten' ),
            'add_or_remove_items'        => __( 'Add or remove Categories', 'themecycle-exten' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'themecycle-exten' ),
            'popular_items'              => __( 'Popular Categories', 'themecycle-exten' ),
            'search_items'               => __( 'Search Categories', 'themecycle-exten' ),
            'not_found'                  => __( 'Not Found', 'themecycle-exten' ),
        );

        $rewrite = array(
            'slug'                       => __( 'gallery-category', 'themecycle-exten' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );

        register_taxonomy( 'gallery-category', array( 'gallery' ), $args );
}
add_action( 'init', 'themecycle_extention_custom_init' );

add_action("init", function () {
   remove_shortcode("course_media");
   add_shortcode("course_media", 'educationpress_course_media');
   function educationpress_course_media( $atts ) {
		extract( shortcode_atts( array(
			'course_id' => CoursePress_Helper_Utility::the_course( true ),
			'type' => '', // Default, video, image.
			'priority' => '', // Gives priority to video (or image).
			'list_page' => 'no',
			'class' => '',
			'wrapper' => '',
			//changed by themecycle
			'height' => '',
			'width' => '',
		), $atts, 'course_media' ) );
		
		$orig_list_page = $list_page;
		$course_id = (int) $course_id;
		if ( empty( $course_id ) ) { return ''; }

		$type = sanitize_text_field( $type );
		$priority = sanitize_text_field( $priority );
		$list_page = cp_is_true( sanitize_html_class( $list_page ) );
		$class = sanitize_html_class( $class );
		$wrapper = sanitize_html_class( $wrapper );
		$height = sanitize_text_field( $height );
		$width = sanitize_text_field( $width );

		// We'll use pixel if none is set
		if ( ! empty( $width ) && (int) $width == $width ) {
			$width .= 'px';
		}
		if ( ! empty( $height ) && (int) $height == $height ) {
			$height .= 'px';
		}

		if ( ! $list_page ) {
			$type = empty( $type ) ? CoursePress_Core::get_setting( 'course/details_media_type', 'default' ) : $type;
			$priority = empty( $priority ) ? CoursePress_Core::get_setting( 'course/details_media_priority', 'video' ) : $priority;
		} else {
			$type = empty( $type ) ? CoursePress_Core::get_setting( 'course/listing_media_type', 'default' ) : $type;
			$priority = empty( $priority ) ? CoursePress_Core::get_setting( 'course/listing_media_priority', 'image' ) : $priority;
		}

		$priority = 'default' != $type ? false : $priority;
		

		// Saves some overhead by not loading the post again if we don't need to.
		$class = sanitize_html_class( $class );

		$course_video = CoursePress_Data_Course::get_setting( $course_id, 'featured_video' );
		
		$course_image = CoursePress_Data_Course::get_setting( $course_id, 'listing_image' );
		
		
		if ( 'yes' == $orig_list_page ) {
			$course_image_id = educationpress_get_image_id($course_image);	
			//$course_image_arr = wp_get_attachment_image_src( $course_image_id, 'medium'  );
			$course_image_arr = wp_get_attachment_image_src( $course_image_id, 'educationpress-course-list'  );
			
			if( $course_image_arr && $course_image_id)
			{
				$course_image =  $course_image_arr[0];
			}
			//for old Courses
			elseif( get_post_meta( $course_id, '_thumbnail_id', true ) )
			{
				$course_image = get_post_meta( $course_id, '_thumbnail_id', true );
			}
			
		}
	

		$content = '';

		if ( 'thumbnail' == $type ) {
			$type = 'image';
			$priority = 'image';
		}

		// If no wrapper and we're specifying a width and height, we need one, so will use div.
		if ( empty( $wrapper ) && ( ! empty( $width ) || ! empty( $height ) ) ) {
			$wrapper = 'div';
		}

		$wrapper_style = '';
		$wrapper_style .= ! empty( $width ) ? 'width:' . $width . ';' : '';
		$wrapper_style .= ! empty( $width ) ? 'height:' . $height . ';' : '';

		if ( is_singular( 'course' ) ) {
			$wrapper_style = '';
		}

		if ( ( ( 'default' == $type && 'video' == $priority ) || 'video' == $type || ( 'default' == $type && 'image' == $priority && empty( $course_image ) ) ) && ! empty( $course_video ) ) {

			$content = '<div class="video_player course-featured-media course-featured-media-' . $course_id . ' ' . $class . '">';

			$content .= ! empty( $wrapper ) ? '<' . $wrapper . ' style="' . $wrapper_style . '">' : '';

			$video_extension = pathinfo( $course_video, PATHINFO_EXTENSION );

			if ( ! empty( $video_extension ) ) {
				$attr = array(
					'src' => $course_video,
				);
				$content .= wp_video_shortcode( $attr );
			} else {
				$embed_args = array();

				// Add YouTube filter.
				if ( preg_match( '/youtube.com|youtu.be/', $course_video ) ) {
					add_filter( 'oembed_result', array(
						'CoursePress_Helper_Utility',
						'remove_related_videos',
					), 10, 3 );
				}

				$content .= wp_oembed_get( $course_video, $embed_args );
			}

			$content .= ! empty( $wrapper ) ? '</' . $wrapper . '>' : '';
			$content .= '</div>';
		}

		if ( ( ( 'default' == $type && 'image' == $priority ) || 'image' == $type || ( 'default' == $type && 'video' == $priority && empty( $course_video ) ) ) && ! empty( $course_image ) ) {

			$content .= '<div class="course-thumbnail course-featured-media course-featured-media-' . $course_id . ' ' . $class . '">';
			$content .= ! empty( $wrapper ) ? '<' . $wrapper . ' style="' . $wrapper_style . '">' : '';

			$content .= '<img src="' . esc_url( $course_image ) . '" class="course-media-img"></img>';

			$content .= ! empty( $wrapper ) ? '</' . $wrapper . '>' : '';
			$content .= '</div>';
		}

		return $content;
	}
	
   
   function educationpress_get_image_id($image_url) {
	global $wpdb;
    return $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid=%s", $image_url ) );
	/*
	$sql = "SELECT ID FROM $wpdb->posts WHERE guid='".$image_url."';";
	$attachment = $wpdb->get_col( $sql ); 
	return $attachment[0]; 
	*/
}
   
   

	add_shortcode( 'educationpress_unit_archive_list', 'educationpress_unit_archive_list' );
	function educationpress_unit_archive_list( $atts ) {
		extract( shortcode_atts( array(
			'course_id' => CoursePress_Helper_Utility::the_course( true ),
			'with_modules' => false,
			'description' => false,
			'knob_data_width' => '68',
			'knob_data_height' => '68',
			'knob_fg_color' => '#fe5722',
			'knob_bg_color' => '#fe5722',
			'knob_data_thickness' => '0.18',
		), $atts, 'unit_archive_list' ) );

		CoursePress_Data_Student::log_student_activity( 'course_unit_seen' );

		$course_id = (int) $course_id;
		if ( empty( $course_id ) ) { return ''; }

		$with_modules = cp_is_true( $with_modules );
		$course_base_url = CoursePress_Data_Course::get_course_url( $course_id );
		$can_update_course = CoursePress_Data_Capabilities::can_update_course( $course_id );

		if ( ! $with_modules ) {
			$unit_mode = CoursePress_Data_Course::get_setting( $course_id, 'structure_level', 'unit' );
			$with_modules = 'section' == $unit_mode;
		}

		$view_mode = CoursePress_Data_Course::get_setting( $course_id, 'course_view', 'normal' );
		$base_link = $course_base_url; //get_permalink( $course_id );

		$knob_fg_color = sanitize_text_field( $knob_fg_color );
		$knob_bg_color = sanitize_text_field( $knob_bg_color );
		$knob_data_thickness = sanitize_text_field( $knob_data_thickness );
		$knob_data_width = (int) $knob_data_width;
		$knob_data_height = (int) $knob_data_height;

		$student_id = get_current_user_id();
		$instructors = CoursePress_Data_Course::get_instructors( $course_id );
		$is_instructor = is_array( $instructors ) && in_array( $student_id, $instructors );

		$content = '';

		$unit_status = array( 'publish' );
		if ( current_user_can( 'manage_options' ) || $is_instructor ) {
			$unit_status[] = 'draft';
		}

		if ( ! $with_modules ) {
			$units = CoursePress_Data_Course::get_units(
				CoursePress_Helper_Utility::the_course( true ),
				$unit_status
			);
		} else {
			$units = CoursePress_Data_Course::get_units_with_modules( $course_id, $unit_status );
			$units = CoursePress_Helper_Utility::sort_on_key( $units, 'order' );
		}

		$content .= sprintf( '<div class="unit-archive-list-wrapper" data-view-mode="%s">', esc_attr( $view_mode ) );
		$content .= count( $units ) > 0 ? '<ul class="units-archive-list">' : '';
		$counter = 0;

		$enrolled = false;
		$student_progress = false;
		if ( ! empty( $student_id ) ) {
			$enrolled = CoursePress_Data_Course::student_enrolled( $student_id, $course_id );
		}
		if ( $enrolled ) {
			CoursePress_Data_Student::get_calculated_completion_data( $student_id, $course_id );
			$student_progress = CoursePress_Data_Student::get_completion_data( $student_id, $course_id );
		}

		$is_course_available = CoursePress_Data_Course::is_course_available( $course_id );
		$clickable = true;
		$previous_unit_id = false;
		$last_module_id = false;


	
		foreach ( $units as $unit ) {
			$the_unit = $with_modules ? $unit['unit'] : $unit;
			$unit_id = $the_unit->ID;

			// Hide hidden unit
			$is_unit_structure_visible = CoursePress_Data_Unit::is_unit_structure_visible( $course_id, $unit_id, $student_id );

			if ( ! $is_unit_structure_visible ) { continue; }

			if ( is_object( $unit ) ) { $unit = get_object_vars( $unit ); }

			$can_view = CoursePress_Data_Course::can_view_unit( $course_id, $unit_id );

			$is_unit_available = $is_course_available ? CoursePress_Data_Unit::is_unit_available( $course_id, $the_unit, $previous_unit_id ) : $is_course_available;
			$previous_unit_id = $unit_id;

			if ( ! $can_view ) { continue; }

			$scode = sprintf(
				'[course_unit_percent course_id="%s" unit_id="%s" format="true" style="extended" knob_fg_color="%s" knob_bg_color="%s" knob_data_thickness="%s" knob_data_width="%s" knob_data_height="%s"]',
				$course_id,
				$unit_id,
				$knob_fg_color,
				$knob_bg_color,
				$knob_data_thickness,
				$knob_data_width,
				$knob_data_height
			);
			$unit_progress = do_shortcode( $scode );

			$additional_class = '';
			$additional_li_class = '';

			if ( ! $can_update_course && $last_module_id > 0 && $clickable ) {
				// Check if the last module is already answered.
				$is_last_module_done = CoursePress_Data_Module::is_module_done_by_student( $last_module_id, $student_id );

				if ( ! $is_last_module_done ) {
					$clickable = false;
				}
			}

			if ( ( ! $can_update_course && $enrolled && ! $is_unit_available ) || ! $clickable ) {
				$additional_class = 'locked-unit';
				$additional_li_class = 'li-locked-unit';
			}

			if ( $enrolled ) {
				// Check if unit is completed
				$is_unit_completed = CoursePress_Helper_Utility::get_array_val(
					$student_progress,
					'completion/' . $unit_id . '/completed'
				);
				if ( cp_is_true( $is_unit_completed ) ) {
					$additional_li_class .= ' unit-li-completed';
				} else {
					// Check if the first section/page is seen
					$is_first_page_seen = CoursePress_Data_Student::is_section_seen( $course_id, $unit_id, 1, $student_id );
					if ( $clickable && $is_first_page_seen ) {
						$additional_li_class .= ' unit-seen';
					}
				}
			}

			if ( ! $enrolled ) {
				$unit_progress = '';
				if ( ! $is_unit_available && ! $can_view ) {
					continue;
				}
			}

			//$unit_feature_image = get_post_meta( $unit_id, 'unit_feature_image', true );
			/*$unit_image = ($unit_feature_image) ? '<div class="circle-thumbnail"><div class="unit-thumbnail"><img src="' . $unit_feature_image . '"" alt="' . $the_unit->post_title . '" /></div></div>' : '';
			*/

			$post_name = empty( $the_unit->post_name ) ? $the_unit->ID : $the_unit->post_name;
			$title_suffix = '';
			if ( 'publish' != $the_unit->post_status && $can_update_course ) {
				$title_suffix = esc_html__( ' [DRAFT]', 'cp' );
			}

			if ( ! $is_unit_available && $enrolled ) {
				$unit_status = do_shortcode(
					'[module_status format="true" unit_id="' . $unit_id . '" previous_unit="' . $previous_unit_id . '"]'
				);
				$unit_status = strip_tags( $unit_status );
			}
			if ( ! $clickable ) {
				$unit_status = __( 'This unit is available, but you need to complete all the REQUIRED modules before this unit.', 'cp' );
				$is_unit_available = false;
			}

			if ( ! $is_unit_available && $enrolled ) {
				$unit_availability_date = CoursePress_Data_Unit::get_unit_availability_date( $unit_id, $course_id );

				if ( ! empty( $unit_availability_date ) && 'expired' != $unit_availability_date ) {
					$unit_availability_date = CoursePress_Data_Course::strtotime( $unit_availability_date );
					$year_now = date( 'Y', CoursePress_Data_Course::time_now() );
					$unit_year = date( 'Y', $unit_availability_date );
					$format = $year_now !== $unit_year ? 'M d Y' : 'M d';

					// Requires custom hook to attached
					$when = date( $format, $unit_availability_date );

					$delay_date = sprintf( '<span class="unit-delay-date">%s %s</span>', __( 'Opens', 'cp' ), $when );
					$unit_status = __( 'This unit will be available on the scheduled start date.', 'cp' );
					/**
					 * Filter delay date markup.
					 *
					 * @since 2.0
					 *
					 * @param (string) $delay_date 	The HTML markup.
					 * @param (date) $unit_availability_date	The date the unit becomes available.
					 *
					 * @return $date or null
					 **/
					$delay_date = apply_filters( 'coursepress_unit_delay_markup', $delay_date, $unit_availability_date );

					$title_suffix .= $delay_date;
				}
			}

			if ( $is_unit_available || $can_update_course ) {
				$unit_url = CoursePress_Data_Unit::get_unit_url( $unit_id );
			} else {
				$unit_url = remove_query_arg( 'dummy-query' );
			}

			$unit_link = sprintf(
				'<a class="unit-archive-single-title" href="%s" data-original-href="%s" rel="bookmark">%s %s</a>',
				esc_url( $unit_url ),
				esc_url( $unit_url ),
				$the_unit->post_title,
				$title_suffix
			);

			if ( ( ! $is_unit_available && ! $can_update_course ) || ( ! $clickable && ! $can_update_course ) ) {
				$unit_link = sprintf( '<span class="unit-archive-single-title">%s</span>', $the_unit->post_title . ' ' . $title_suffix );
			}

			if ( $with_modules ) {
				$has_pages = isset( $unit['pages'] ) && ! empty( $unit['pages'] );
			} else {
				$found = get_posts(
					array(
						'post_type' => CoursePress_Data_Module::get_post_type_name(),
						'post_status' => $can_update_course ? 'any' : 'publish',
						'post_parent' => $the_unit->ID,
						'posts_per_page' => 1,
						'fields' => 'ids',
					)
				);

				$has_pages = count( $found ) > 0;
			}

			// Don't show units without modules/elements.
			if ( ! $has_pages && ! $can_update_course ) {
				continue;
			}

			$unit_data = '';
			if ( ! empty( $unit_status ) && ! $can_update_course && ! is_array( $unit_status ) ) {
				$unit_data = sprintf( ' data-title="%s"', esc_attr( $unit_status ) );
			}


			/*if ( ! empty( $module_table ) && ( ( $is_unit_available && $with_modules ) || $can_update_course ) ) {
				$unit_link = '<span class="fold"></span> '.$unit_link;
				$additional_li_class .= ' unfolded';
			}
			*/

			$content .= '<li class="' . esc_attr( $additional_li_class ) . '"'. $unit_data . '>'
				.
				'<div class="unit-archive-single">' .
				$unit_progress .
				//$unit_image .
				$unit_link;

			//$content .= $module_table;

			$content .= '</div></li>';
		}

		$content .= count( $units ) > 0 ? '</ul>' : '';

		if ( empty( $units ) ) {
			$content .= '<h3 class="zero-course-units">' . esc_html__( 'No units in the course currently. Please check back later.' ) . '</h3>';
		}
		$content .= '</div>';

		return $content;
	}

	
});

add_action( 'plugins_loaded', 'themecycle_exten_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function themecycle_exten_load_textdomain() {
  load_plugin_textdomain( 'themecycle-extensions', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}


/*
 * Meta Box Extensions
 */
require_once (plugin_dir_path( __FILE__ ) . '/shortcodes/shortcodes.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-columns/meta-box-columns.php' );         // columns
require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-show-hide/meta-box-show-hide.php' );     // show hid
require_once ( plugin_dir_path( __FILE__ ) . 'meta-box-extensions/meta-box-tabs/meta-box-tabs.php' );               // tabs
