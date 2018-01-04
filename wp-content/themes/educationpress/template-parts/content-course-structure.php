<?php
/**
 * Template part for displaying course Curriculum.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EducationPress
 */
global $educationpress_options;
?>
<div id="stucture" class="courses-info clearfix <?php if( ( !empty( $_GET['tab'])  && $_GET['tab'] == 'yes' )  || (empty( $_GET['tab'] ) && !empty( $educationpress_options[ 'educationpress_coursedetail_with_tab' ] ) && $educationpress_options[ 'educationpress_coursedetail_with_tab' ] )  )  {?> tab-pane fade <?php global $active_sec; if($active_sec == 'structure'):?>in active<?php endif;?><?php } ?>">


<?php 
$atts = array();
	$orig_atts = $atts;

	extract( shortcode_atts( array(
		'course_id' => CoursePress_Helper_Utility::the_course( true ),
		'free_text' => __( 'Preview', 'educationpress' ),
		'free_show' => 'true',
		'free_class' => 'free',
		'show_title' => 'no',
		'show_label' => 'no',
		'label_delimeter' => ': ',
		'label_tag' => 'h2',
		'show_divider' => 'yes',
		'show_estimates' => 'no',
		'label' => __( 'Course Structure', 'educationpress' ),
		'class' => '',
		'deep' => true,
	), $atts, 'course_structure' ) );

	$course_id = (int) $course_id;
	$free_text = sanitize_text_field( $free_text );
	$show_title = cp_is_true( sanitize_text_field( $show_title ) );
	$show_label = cp_is_true( sanitize_text_field( $show_label ) );
	$free_show = cp_is_true( sanitize_text_field( $free_show ) );
	$show_estimates = cp_is_true( sanitize_text_field( $show_estimates ) );
	$label_delimeter = sanitize_html_class( $label_delimeter );
	$label_tag = sanitize_html_class( $label_tag );
	$show_divider = cp_is_true( sanitize_text_field( $show_divider ) );
	$label = sanitize_text_field( $label );
	$title = ! empty( $label ) ? '<h3>'.$educationpress_options['educationpress_coursedetail_structure_title'].'</h3>' : $label;
	$class = sanitize_html_class( $class );
	$deep = cp_is_true( sanitize_text_field( $deep ) );
	$with_modules = false;
	$counter = 0;

	$content = '';
	if ( empty( $course_id ) ) { return ''; }

	$structure_visible = cp_is_true(
		CoursePress_Data_Course::get_setting( $course_id, 'structure_visible' )
	);

	if ( ! $structure_visible ) { return ''; }

	$time_estimates = cp_is_true(
		CoursePress_Data_Course::get_setting( $course_id, 'structure_show_duration' )
	);
	//for not displaying any time
	//$time_estimates = false;

	$preview = CoursePress_Data_Course::previewability( $course_id );
	$visibility = CoursePress_Data_Course::structure_visibility( $course_id );
	$structure_level = CoursePress_Data_Course::get_setting( $course_id, 'structure_level' );
	$is_unit_only = 'unit' === $structure_level;

	if ( ! $visibility['has_visible'] ) { return ''; }

	$student_id = is_user_logged_in() ? get_current_user_id() : 0;
	$enrolled = false;
	$student_progress = false;

	if ( ! empty( $student_id ) ) {
		$enrolled = CoursePress_Data_Course::student_enrolled( $student_id, $course_id );
	}
	if ( $enrolled ) {
		$student_progress = CoursePress_Data_Student::get_completion_data( $student_id, $course_id );
	}

	$units = CoursePress_Data_Course::get_units_with_modules( $course_id, array( 'publish' ) );
	$units = CoursePress_Helper_Utility::sort_on_key( $units, 'order' );

	if ( CoursePress_Data_Capabilities::can_update_course( $course_id ) ) {
		$enrolled = true;
	}

	$is_course_available = CoursePress_Data_Course::is_course_available( $course_id );
	$can_update_course = CoursePress_Data_Capabilities::can_update_course( $course_id );
	$enrolled_class = $enrolled ? 'enrolled' : '';
	$o_atts = '';

	foreach ( $orig_atts as $k => $v ) {
		$o_atts .= 'data-' . $k . '="' . esc_attr( $v ) . '"';
	}

	$classes = array(
		'course-structure-block',
		sprintf( 'course-structure-block-%d', $course_id ),
		$enrolled_class,
	);
	$classes[] = $enrolled? 'student-is-enroled' : 'student-not-enroled';

	$content .= sprintf(
		'<div class="%s" data-nonce="%s" data-course="%s" %s>',
		esc_attr( implode( ' ', $classes ) ),
		esc_attr( wp_create_nonce( 'course_structure_refresh' ) ),
		esc_attr( $course_id ),
		$o_atts
	);

	$content .= $title;

	$course_slug = get_post_field( 'post_name', $course_id );

	$content .= '<ul class="tree">';
	$last_unit = 0;
	$counter = 0;

	/**
	 * $unitname & $paged - needed for "current" class
	 */
	$unitname = get_query_var( 'unitname' );
	$paged = get_query_var( 'paged' );
	$clickable = true;
	$last_module_id = false;

	foreach ( $units as $unit_id => $unit ) {
		$is_unit_visible = CoursePress_Data_Unit::is_unit_structure_visible( $course_id, $unit_id );
		if ( ! $is_unit_visible ) {
			continue;
		}

		$the_unit = $unit['unit'];
		$previous_unit_id = CoursePress_Data_Unit::get_previous_unit_id( $course_id, $the_unit->ID );

		$is_unit_available = $is_course_available ? CoursePress_Data_Unit::is_unit_available( $course_id, $the_unit, $previous_unit_id ) : $is_course_available;

		$unit_link = CoursePress_Core::get_slug( 'courses/', true ) .
			$course_slug . '/' .
			CoursePress_Core::get_slug( 'unit/' ) .
			$unit['unit']->post_name;

		$estimation = CoursePress_Data_Unit::get_time_estimation( $unit_id, $units );

		if ( $last_module_id > 0 && $clickable ) {
			// Check if the last module is already answered.
			$is_last_module_done = CoursePress_Data_Module::is_module_done_by_student( $last_module_id, $student_id );

			if ( ! $is_last_module_done ) {
				$clickable = false;
			}
		}

		$unit_title = ( $is_unit_available && $enrolled && $clickable ) || $can_update_course ? '<a href="' . esc_url( $unit_link ) . '">' . esc_html( $unit['unit']->post_title ) . '</a>' : '<span>' . esc_html( $unit['unit']->post_title ) . '</span>';

		$is_current_unit = false;
		$classes = array( 'unit' );
		if ( $unitname == $unit['unit']->post_name ) {
			$classes[] = 'current-unit';
			$is_current_unit = true;
		}

		$content .= sprintf( '<li class="%s">', implode( ' ', $classes ) );
			
		if ( $can_update_course ) {
			$content .= '<span class="fold"></span>';
		}
		/**
		 * add enroled information to wrapper
		 */
		$content .= sprintf(
			'<div class="unit-title-wrapper" data-student-is-enroled="%d">',
			esc_attr( $enrolled )
		);
		$content .= '<div class="unit-title">' . $unit_title . '</div>';

		//theme cycle interfere here
		if ( $free_show && ! $enrolled && ! empty( $preview['structure'][ $unit_id ] ) && ! is_array( $preview['structure'][ $unit_id ] ) ) {
		//if ( $free_show  ) {
			
			if ( empty( $last_unit ) ) {
				$unit_available = true;
			} else {
				$unit_available = CoursePress_Data_Unit::is_unit_available( $course_id, $unit_id, $last_unit );
			}
			if ( $unit_available ) {
				$content .= '<div class="unit-link preview_option"><a href="' . esc_url( $unit_link ) . '">' . $free_text . '</a></div>';
			}
		}
		
		$content .= '</div>';

	
		if ( ( ! $can_update_course && $is_unit_only ) || ( ! $is_unit_available && ! $can_update_course ) || ( ! $clickable && ! $can_update_course ) ) {
			//commented by themecycle
			//continue;
		}
		
		
		if ( ! isset( $unit['pages'] ) ) {
			$unit['pages'] = array();
		}

		if ( false === $enrolled && false === $can_update_course ) {
			//commented by themecycle
			//continue;
		}

		$content .= '<ul class="unit-structure-modules tree">';
		$count = 0;
		ksort( $unit['pages'] );
		foreach ( $unit['pages'] as $key => $page ) {

			// Hide pages if it is not set as visible
			$show_page = CoursePress_Data_Unit::is_page_structure_visible( $course_id, $unit_id, $key, $student_id );
			//	if ( empty( $show_page ) ) { continue; }

			$count += 1;

			$page_link = trailingslashit( $unit_link ) . 'page/' . $key;
			$page_title = empty( $page['title'] ) ? sprintf( __( 'Untitled Page %s', 'educationpress' ), $count ) : $page['title'];
			$page_title = $enrolled ? '<a href="' . esc_url( $page_link ) . '">' . esc_html( $page_title ) . '</a>' : esc_html( $page_title );

			$classes = array(
				'unit-page',
				sprintf( 'unit-page-%d', $count ),
			);
			if ( $is_current_unit && $paged == $count ) {
				$classes[] = 'current-unit-page';
			}
			

			if ( $last_module_id > 0 && $clickable ) {
				// Check if the last module is already answered.
				$is_last_module_done = CoursePress_Data_Module::is_module_done_by_student( $last_module_id, $student_id );

				if ( ! $is_last_module_done ) {
					$clickable = false;
				}
			}

			if ( ! $clickable && ! $can_update_course ) {
				//$page_title = sprintf( '<span>%s</span>', strip_tags( $page_title ) );
				$page_title = sprintf( '%s', strip_tags( $page_title ) );
			}

			$content .= sprintf( '<li class="%s">', implode( ' ', $classes ) );

			/**
			 * page is visible?
			 */
			$heading_visible = isset( $page['visible'] ) && $page['visible'];

			if ( $heading_visible && ! empty( $page['modules'] ) ) {
				$preview_class = ( $free_show && ! $enrolled && ! empty( $preview['structure'][ $unit_id ] ) && is_array( $preview['structure'][ $unit_id ] ) ) ? $free_class : '';
				$content .= '<div class="unit-page-title-wrapper ' . $preview_class . '">';

				$content .= '<div class="unit-page-title unit-page-title-one">' . $page_title . '</div>';
				if ( $free_show && ! $enrolled && ! empty( $preview['structure'][ $unit_id ] ) && is_array( $preview['structure'][ $unit_id ] ) ) {
					$content .= '<div class="unit-page-link"><a href="' . esc_url( $page_link ) . '">' . $free_text . '</a></div>';
				}

				if ( $time_estimates ) {
					$page_estimate = ! empty( $estimation['pages'][ $key ]['components']['hours'] ) ? str_pad( $estimation['pages'][ $key ]['components']['hours'], 2, '0', STR_PAD_LEFT ) . ':' : '';
					$page_estimate = isset( $estimation['pages'][ $key ]['components']['minutes'] ) ? $page_estimate . str_pad( $estimation['pages'][ $key ]['components']['minutes'], 2, '0', STR_PAD_LEFT ) . ':' : $page_estimate;
					$page_estimate = isset( $estimation['pages'][ $key ]['components']['seconds'] ) ? $page_estimate . str_pad( $estimation['pages'][ $key ]['components']['seconds'], 2, '0', STR_PAD_LEFT ) : '';
					$page_estimate = apply_filters( 'coursepress_page_estimation', $page_estimate, $estimation['pages'][ $key ] );
					
					//Added By Themecycle Prashant
					/*
					&& 
					( 
					stripos($type_class, 'image') !== false 
					|| 
					stripos($type_class, 'audio') !== false 
					||
					stripos($type_class, 'input') !== false ) 
					)
					*/
					if($page_estimate != '00:00:00' )
					{
						$content .= '<div class="unit-page-estimate">' . esc_html( $page_estimate ) . '</div>';
					}
				}
				$content .= '</div>';
			}

			

			if ( $enrolled && ! $clickable && ! $can_update_course ) {
				continue;
			}

			// Add Module Level.
			$structure_level = CoursePress_Data_Course::get_setting( $course_id, 'structure_level', 'unit' );

			if ( $deep || 'section' === $structure_level || 'unit' === $structure_level ) {
				$visibility_count = 0;
				$list_content = '<ul class="page-modules">';
				$prev_module_id = 0;
				
				

					
				foreach ( $page['modules'] as $m_key => $module ) {
					// Hide module if not set as visible
					$is_module_visible = CoursePress_Data_Unit::is_module_structure_visible( $course_id, $unit_id, $m_key, $student_id );
					if ( ! $is_module_visible ) {
						//Commented by themecycle
						//continue;
					}

					$classes = array(
						'module',
						sprintf( 'module-%d', $module->ID ),
					);
					$list_content .= sprintf( '<li class="%s">', implode( ' ', $classes ) );


					$preview_class = ( $free_show && ! $enrolled && ! empty( $preview['structure'][ $unit_id ] ) && ! empty( $preview['structure'][ $unit_id ][ $key ] ) && ! empty( $preview['structure'][ $unit_id ][ $key ][ $m_key ] ) ) ? $free_class : '';
					$type_class = get_post_meta( $m_key, 'module_type', true );
					
					
					$attributes = CoursePress_Data_Module::attributes( $m_key );

					/**
					 * do not show title
					 */
					$show_title = isset( $attributes['show_title'] ) && cp_is_true( $attributes['show_title'] );
					if ( ! $show_title ) {
						continue;
					}
					

					$attributes['course_id'] = $course_id;

					// Get completion states
					$module_seen = CoursePress_Helper_Utility::get_array_val( $student_progress, 'completion/' . $unit_id . '/modules_seen/' . $m_key );
					
					$module_passed = CoursePress_Helper_Utility::get_array_val( $student_progress, 'completion/' . $unit_id . '/passed/' . $m_key );
					
					$module_answered = CoursePress_Helper_Utility::get_array_val( $student_progress, 'completion/' . $unit_id . '/answered/' . $m_key );

					$seen_class = isset( $module_seen ) && ! empty( $module_seen ) ? 'module-seen' : '';
					$passed_class = isset( $module_passed ) && ! empty( $module_passed ) && $attributes['assessable'] ? 'module-passed' : '';
					$answered_class = isset( $module_answered ) && ! empty( $module_answered ) && $attributes['mandatory'] ? 'not-assesable module-answered' : '';
					$completed_class = isset( $module_passed ) && ! empty( $module_passed ) && $attributes['assessable'] && $attributes['mandatory'] ? 'module-completed' : '';
					$completed_class = empty( $completed_class ) && isset( $module_passed ) && ! empty( $module_answered ) && ! $attributes['assessable'] && $attributes['mandatory'] ? 'module-completed' : '';

					if ( $prev_module_id > 0 ) {
						$is_done = CoursePress_Data_Module::is_module_done_by_student( $prev_module_id, $student_id );
						if ( false === $is_done ) 
						{
							$clickable = false;
						} else {
							$last_module_id = $m_key;
						}
					}
					$prev_module_id = $m_key;

					$list_content .= '
						<div class="unit-page-module-wrapper ' . $preview_class . ' ' . $type_class . ' ' . $passed_class . ' ' . $answered_class . ' ' . $completed_class . ' ' . $seen_class . '">
						';
					
					
					
					$module_link = trailingslashit( $unit_link ) . 'page/' . $key . '#module-' . $m_key;
					$module_title = $module->post_title;
					$module_title = $enrolled ? '<a href="' . esc_url( $module_link ) . '">' . esc_html( $module_title ) . '</a>' : esc_html( $module_title );

					if ( ! $clickable && ! $can_update_course ) {
						$module_title = sprintf( '%s', $module->post_title );
					}

					/*
					if ( $free_show && ! $enrolled && ! empty( $preview['structure'][ $unit_id ] ) && ! empty( $preview['structure'][ $unit_id ][ $key ] ) && ! empty( $preview['structure'][ $unit_id ][ $key ][ $m_key ] ) ) {
						
						$list_content .= '<div class="unit-module-preview-link"><a href="' . esc_url( $module_link ) . '">' . $free_text . '</a></div>';
					}
					*/
					
					
					/*if ( $free_show ) {
						$list_content .= '<div class="unit-module-preview-link"><a href="' . esc_url( $module_link ) . '">' . $free_text . '</a></div>';
					}
*/
					$visibility_count += 1;
					$list_content .= sprintf('<div class="module-title" data-title="%s">', esc_attr__( 'Preview', 'educationpress' ));
					
					$list_content .= '';
						
					//For Put module type icon
					if( $type_class == 'text_module' )
					{
						$list_content .= '<i class="fa fa-file-text-o"></i>';
					}
					elseif( $type_class == 'image_module' || $type_class == 'image')
					{
						$list_content .= '<i class="fa fa-image"></i>';
					}
					elseif( $type_class == 'video_module' || $type_class == 'video')
					{
						$list_content .= '<i class="fa fa-play-circle"></i>';
					 
					}
					elseif( $type_class == 'audio_module' ||  $type_class == 'audio' )
					{
						$list_content .= '<i class="fa fa-music"></i>';
					}
					elseif( $type_class == 'zipped' ||  $type_class == 'input-upload' )
					{
						$list_content .= '<i class="fa fa-upload"></i>';
					}
					elseif( $type_class == 'zipped' ||  $type_class == 'input-download' || $type_class== 'download' )
					{
						$list_content .= '<i class="fa fa-download"></i>';
					}
					elseif(  $type_class ==  'input-quiz' )
					{
							$list_content .= '<i class="fa fa-question-circle"></i>';
					}
					elseif( $type_class == 'discussion'  )
					{
						$list_content .= '<i class="fa fa-question-circle"></i>';
					}
					elseif( $type_class == 'checkbox_input_module' || $type_class == 'input-quiz' )
					{
						$list_content .= '<i class="fa fa-check-square-o"></i>';
					 }
					 elseif( $type_class == 'file_input_module')
					 {
						$list_content .= '<i class="fa fa-upload"></i>';
					 }
					 elseif( $type_class == 'radio_input_module' ||  stripos($type_class, 'input') !== false )
					 { 
						$list_content .= '<i class="fa fa-check-circle"></i>';
					 }
					 elseif( $type_class == 'text_input_module')
					 {
						$list_content .= '<i class="fa fa-edit"></i>';
					 }
					 else
					 {
						 $list_content .= '<i class="fa fa-edit"></i>';
					 }
						 
					$list_content .= '';
					
					
					
					$list_content .= '<div class="unit-page-title">'.$module_title.'</div>';
					if ( $free_show && ! $enrolled && ! empty( $preview['structure'][ $unit_id ] ) && ! empty( $preview['structure'][ $unit_id ][ $key ] ) && ! empty( $preview['structure'][ $unit_id ][ $key ][ $m_key ] ) ) {
						
						$list_content .= '<div class="unit-module-preview-link"><a href="' . esc_url( $module_link ) . '">' . $free_text . '</a></div>';
					}
					/*
					else
					{
						$list_content .= $module_title;	
					}
					*/
					$list_content .= '</div>';
					
					$list_content .= '</div>';
					$list_content .= '</li>';
				}
				$list_content .= '</ul>'; // Modules

				if ( ! empty( $visibility_count ) ) 
				{
					$content .= $list_content;
				}
			}

			$content .= '</li>'; // Page Title
		}
		$content .= '</ul>';

		$content .= '</li>'; // Unit

		$last_unit = $unit_id;
	}

	$content .= '</ul>';
	$content .= '</div>';

	echo balanceTags($content, true);
	?>
</div>