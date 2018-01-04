<?php
function edupress_ecommerce_remove_widgets($widgets){
	unset($widgets['Edupress_Ecommerce_Search_Cat_Filter_Widget']);
	unset($widgets['Edupress_Ecommerce_Search_Lang_Filter_Widget']);
	unset($widgets['Edupress_Ecommerce_Search_Price_Filter_Widget']);
	unset($widgets['Edupress_Ecommerce_Course_Search_Widget']);
	unset($widgets['Edupress_Ecommerce_Courses_Widget']);
	unset($widgets['Edupress_Ecommerce_Recent_Events_Widget']);
	unset($widgets['Edupress_Ecommerce_Recent_Posts_Widget']);
	unset($widgets['Edupress_Ecommerce_Similar_Courses_Widget']);
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'edupress_ecommerce_remove_widgets');
function edupress_ecommerce_unregister_widgets()
{
	global $pagenow;
	if ($pagenow == 'widgets.php'){
		unregister_widget('SiteOrigin_Widget_PriceTable_Widget');
		unregister_widget('Edupress_Ecommerce_About_US_How_It_Works_Widget');
		unregister_widget('Edupress_Ecommerce_About_US_Meet_Our_Teachers_Widget');
		unregister_widget('Edupress_Ecommerce_About_US_Partnering_With_Us_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Free_Course_Week_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Instructor_Week_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Latest_News_Updates_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Popular_Courses_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Search_By_Category_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Search_Form_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Sepretor_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Slider_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Upcoming_Event_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_What_People_Say_Widget');
		unregister_widget('Edupress_Ecommerce_Home_One_Why_Should_You_Choose');
		unregister_widget('Edupress_Ecommerce_Home_Three_Browse_By_Category_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Three_Latest_News_Updates_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Three_Popular_Courses_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Three_What_People_Say_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Three_Why_Should_You_Choose');
		unregister_widget('Edupress_Ecommerce_Home_Two_Popular_Courses_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Two_Recent_Post_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Two_Search_Form_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Two_Slider_Widget');
		unregister_widget('Edupress_Ecommerce_Home_Two_What_People_Say_Widget');
	}
}
add_action( 'widgets_init','edupress_ecommerce_unregister_widgets', 11 );	
function edupress_ecommerce_add_widgets_collection($folders){
    $folders[] = get_template_directory() . '/inc/page-builder-widget/';
	return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'edupress_ecommerce_add_widgets_collection');


function edupress_ecommerce_filter_active_widgets($active){
	$active['edupress-ecommerce-home-one-slider'] = true;
	$active['edupress-ecommerce-home-two-slider'] = true;
	$active['edupress-ecommerce-home-one-search-form'] = true;
	$active['edupress-ecommerce-home-two-search-form'] = true;
	$active['edupress-ecommerce-home-one-search-by-category'] = true;
	$active['edupress-ecommerce-home-three-browse-by-category'] = true;
	$active['edupress-ecommerce-home-one-why-choose'] = true;
	$active['edupress-ecommerce-home-three-why-choose'] = true;
	$active['edupress-ecommerce-home-one-sepretor'] = true;
	$active['edupress-ecommerce-home-one-popular-courses'] = true;
	$active['edupress-ecommerce-home-two-popular-courses'] = true;
	$active['edupress-ecommerce-home-three-popular-courses'] = true;
	$active['edupress-ecommerce-home-one-latest-news-updates'] = true;
	$active['edupress-ecommerce-home-three-latest-news-updates'] = true;
	$active['edupress-ecommerce-home-one-what-people-say'] = true;
	$active['edupress-ecommerce-home-two-what-people-say'] = true;
	$active['edupress-ecommerce-home-two-recent-posts'] = true;
	$active['edupress-ecommerce-home-three-what-people-say'] = true;
	$active['edupress-ecommerce-home-one-free-course-week'] = true;
	$active['edupress-ecommerce-home-one-instructor-week'] = true;
	$active['edupress-ecommerce-home-one-upcoming-event'] = true;
	$active['edupress-ecommerce-aboutus-how-it-works'] = true;
	$active['edupress-ecommerce-aboutus-meet-our-teachers'] = true;
	$active['edupress-ecommerce-aboutus-partnering-with-us'] = true;
	
	
	return $active;
}
add_filter('siteorigin_widgets_active_widgets', 'edupress_ecommerce_filter_active_widgets');

function edupress_ecommerce_add_widget_tabs($tabs) {
	$tabs[] = array(
        'title' => esc_html__('Home Page One', 'edupress'),
        'filter' => array(
            'groups' => array('edupressecommercehome1')
        )
    );
	 $tabs[] = array(
        'title' => esc_html__('Home Page Two', 'edupress'),
        'filter' => array(
            'groups' => array('edupressecommercehome2')
        )
    );
	 $tabs[] = array(
        'title' => esc_html__('Home Page Three', 'edupress'),
        'filter' => array(
            'groups' => array('edupressecommercehome3')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'edupress_ecommerce_add_widget_tabs', 20);


function edupress_ecommerce_prebuilt_layouts($layouts){
    $layouts['home-page1'] = array(
        // We'll add a title field
        'name' => __('Home Page 1', 'edupress'),    // Required
        'description' => __('Home Page 1', 'edupress'),    // Optional
        'screenshot' => get_template_directory_uri() . '/inc/page-builder-widget/images/home-page1.jpg',    // Optional
        'widgets' => 
				  array (
					0 => 
					array (
					  'slider_one' => 
					  array (
						0 => 
						array (
						  'slider_image' => 27,
						  'slider_image_fallback' => '',
						  'slider_tag' => 'One Stop Solution for',
						  'slider_title' => 'Education Needs Complete Solution',
						  'slider_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec 
				dictum sapien in augue consequat.',
						  'slider_buttontext' => 'View Courses',
						  'slider_buttonurl' => '#',
						  'slider_newwindow' => false,
						),
						1 => 
						array (
						  'slider_image' => 28,
						  'slider_image_fallback' => '',
						  'slider_tag' => 'E Learning Solution',
						  'slider_title' => 'Complete Solution For You Education Needs',
						  'slider_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec 
				dictum sapien in augue consequat.',
						  'slider_buttontext' => 'View Courses',
						  'slider_buttonurl' => '#',
						  'slider_newwindow' => false,
						),
					  ),
					  '_sow_form_id' => '56ea433eb2928',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Slider_Widget',
						'grid' => 0,
						'cell' => 0,
						'id' => 0,
						'style' => 
						array (
						  'background_image_attachment' => false,
						  'background_display' => 'tile',
						),
					  ),
					),
					1 => 
					array (
					  'title' => 'Emerge yourself by learning new Skills',
					  'form' => '1',
					  'auto_on' => '1',
					  'icon_on' => '1',
					  'icon1' => 'linearicons-lnr-graduation-hat',
					  'icontext1' => 'Over 5 Million Students Enrolled',
					  'icon2' => 'linearicons-lnr-book',
					  'icontext2' => 'More than 25,000 Online Available Courses',
					  'icon3' => 'linearicons-lnr-laptop-phone',
					  'icontext3' => 'Learn skills on any Devices anytime',
					  'icon4' => 'linearicons-lnr-users',
					  'icontext4' => 'More than 5,000 Instructors Registered',
					  '_sow_form_id' => '56ea4eaced454',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Search_Form_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 1,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					2 => 
					array (
					  'text' => 'OR',
					  '_sow_form_id' => '56ea51f8ddd4b',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Sepretor_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 2,
					  ),
					),
					3 => 
					array (
					  'title' => 'Search By Category',
					  'product_cat' => 
					  array (
						0 => 22,
						1 => 15,
						2 => 23,
						3 => 20,
						4 => 16,
						5 => 18,
					  ),
					  '_sow_form_id' => '56ea547570639',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Search_By_Category_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 3,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					4 => 
					array (
					  'title' => 'Most Popular Online Courses',
					  'course_no' => '6',
					  'course_cat' => '0',
					  'course_orderby' => 'ratings',
					  'button_text' => 'Browse all Courses',
					  'button_url' => 'http://www.demos.themecycle.com/EduPress/courses',
					  '_sow_form_id' => '56ea5b5a09448',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Popular_Courses_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 4,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					5 => 
					array (
					  'title' => 'Why should you choose EduPress',
					  'bgimage' => 0,
					  'bgimage_fallback' => '',
					  'services' => 
					  array (
						0 => 
						array (
						  'icon' => 'linearicons-lnr-rocket',
						  'title' => 'Superfast Support',
						  'desc' => 'Lorem Ipsum is simply dummy text of the printing 
				and typesetting industry. When an unknown 
				printer took a galley of type.',
						),
						1 => 
						array (
						  'icon' => 'linearicons-lnr-laptop-phone',
						  'title' => 'Learn on any Device',
						  'desc' => 'Lorem Ipsum is simply dummy text of the printing 
				and typesetting industry. When an unknown 
				printer took a galley of type.',
						),
						2 => 
						array (
						  'icon' => 'linearicons-lnr-license',
						  'title' => 'Certification Courses',
						  'desc' => 'Lorem Ipsum is simply dummy text of the printing 
				and typesetting industry. When an unknown 
				printer took a galley of type.',
						),
					  ),
					  'buttontext1' => 'Buy Theme',
					  'buttonurl1' => '#',
					  'buttontext2' => 'Take a Tour',
					  'buttonurl2' => '#',
					  '_sow_form_id' => '56ea5b8062f04',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Why_Should_You_Choose',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 5,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					6 => 
					array (
					  'title' => 'Latest News &amp; Updates',
					  'news_no' => '5',
					  'news_types' => '1',
					  'news_cat' => '0',
					  'news_tag' => '0',
					  '_sow_form_id' => '56ea5c8147b5c',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Latest_News_Updates_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 6,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					7 => 
					array (
					  'title' => 'What People Say',
					  'bgimage' => 0,
					  'bgimage_fallback' => '',
					  'testi_no' => '4',
					  '_sow_form_id' => '56ea5cb61a455',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_What_People_Say_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 7,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					8 => 
					array (
					  'title' => 'Upcoming Event',
					  '_sow_form_id' => '56ea605eafcfe',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Upcoming_Event_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 0,
						'id' => 8,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					9 => 
					array (
					  'title' => 'Instructor of the Week',
					  '_sow_form_id' => '56ea60c5d790a',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Instructor_Week_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 1,
						'id' => 9,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					10 => 
					array (
					  'title' => 'Free Course of the Week',
					  '_sow_form_id' => '56ea60dcb0e8f',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Free_Course_Week_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 2,
						'id' => 10,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
				  ),
				  'grids' => 
				  array (
					0 => 
					array (
					  'cells' => 1,
					  'style' => 
					  array (
					  ),
					),
					1 => 
					array (
					  'cells' => 3,
					  'style' => 
					  array (
						'class' => 'container',
						'background_display' => 'tile',
					  ),
					),
				  ),
				  'grid_cells' => 
				  array (
					0 => 
					array (
					  'grid' => 0,
					  'weight' => 1,
					),
					1 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					2 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					3 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
				  ),
    );
	
	
	$layouts['home-page2'] = array(
        // We'll add a title field
        'name' => __('Home Page 2', 'edupress'),    // Required
        'description' => __('Home Page 2', 'edupress'),    // Optional
        'screenshot' => get_template_directory_uri() . '/inc/page-builder-widget/images/home-page2.jpg',    // Optional
		 'widgets' => 
				  array (
					0 => 
					array (
					  'slider_two' => 
					  array (
						0 => 
						array (
						  'slider_image' => 375,
						  'slider_image_fallback' => '',
						  'slider_tag' => '',
						  'slider_title' => 'Education Needs Complete Solution',
						  'slider_desc' => 'Maecenas cursus mauris libero, a imperdiet enim pellentesque id. Aliquam erat volutpat Lorem Ipsum is simply dummy.',
						  'slider_buttontext' => 'View Courses',
						  'slider_buttonurl' => '#',
						  'slider_newwindow' => false,
						),
						1 => 
						array (
						  'slider_image' => 378,
						  'slider_image_fallback' => '',
						  'slider_tag' => '',
						  'slider_title' => 'Complete Solution FOR YOUR Education Needs',
						  'slider_desc' => 'Lorem ipsum dolor mauris libero, a imperdiet enim pellentesque id. Aliquam volutpat Lorem Ipsum is simply dummy.',
						  'slider_buttontext' => 'View Courses',
						  'slider_buttonurl' => '#',
						  'slider_newwindow' => false,
						),
					  ),
					  '_sow_form_id' => '56ecf76cdb589',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Two_Slider_Widget',
						'grid' => 0,
						'cell' => 0,
						'id' => 0,
						'style' => 
						array (
						  'background_image_attachment' => false,
						  'background_display' => 'tile',
						),
					  ),
					),
					1 => 
					array (
					  'title' => 'Learn New Skills',
					  'form' => '1',
					  'auto_on' => '1',
					  'icon_on' => '1',
					  'icon1' => 'linearicons-lnr-graduation-hat',
					  'icontext1' => 'Over 5 Million Students Enrolled',
					  'icon2' => 'linearicons-lnr-book',
					  'icontext2' => 'More than 25,000 Online Available Courses',
					  'icon3' => 'linearicons-lnr-laptop-phone',
					  'icontext3' => 'Learn skills on any Devices anytime',
					  'icon4' => 'linearicons-lnr-users',
					  'icontext4' => 'More than 5,000 Instructors Registered',
					  '_sow_form_id' => '56ecfd2257fb4',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Two_Search_Form_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 1,
					  ),
					),
					2 => 
					array (
					  'title' => 'Most Popular Online Courses',
					  'course_no' => '6',
					  'course_cat' => '0',
					  'course_orderby' => 'ratings',
					  'button_text' => 'Browse all Courses',
					  'button_url' => 'http://www.demos.themecycle.com/EduPress/courses',
					  '_sow_form_id' => '56ecfd498bfd3',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Two_Popular_Courses_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 2,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					3 => 
					array (
					  'title' => 'Testimonials',
					  'bgimage' => 0,
					  'bgimage_fallback' => '',
					  'testi_no' => '4',
					  '_sow_form_id' => '56ecfd579cf05',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Two_What_People_Say_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 3,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					4 => 
					array (
					  'title' => 'Upcoming Event',
					  '_sow_form_id' => '56ecfd7689349',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Upcoming_Event_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 0,
						'id' => 4,
					  ),
					),
					5 => 
					array (
					  'title' => 'Instructor of the Week',
					  '_sow_form_id' => '56ecfd7decc12',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Instructor_Week_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 1,
						'id' => 5,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					6 => 
					array (
					  'title' => 'Recent Post',
					  '_sow_form_id' => '56ecfd88131e1',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Two_Recent_Post_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 2,
						'id' => 6,
					  ),
					),
				  ),
				  'grids' => 
				  array (
					0 => 
					array (
					  'cells' => 1,
					  'style' => 
					  array (
					  ),
					),
					1 => 
					array (
					  'cells' => 3,
					  'style' => 
					  array (
						'class' => 'container',
						'background_display' => 'tile',
					  ),
					),
				  ),
				  'grid_cells' => 
				  array (
					0 => 
					array (
					  'grid' => 0,
					  'weight' => 1,
					),
					1 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					2 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					3 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
				  ),
		
	);
	$layouts['home-page3'] = array(
        // We'll add a title field
        'name' => __('Home Page 3', 'edupress'),    // Required
        'description' => __('Home Page 3', 'edupress'),    // Optional
        'screenshot' => get_template_directory_uri() . '/inc/page-builder-widget/images/home-page3.jpg',    // Optional
		 'widgets' => 
				  array (
					0 => 
					array (
					  'title' => 'Browse by Category',
					  'course_cat' => 
					  array (
						0 => 22,
						1 => 15,
						2 => 23,
						3 => 18,
						4 => 20,
						5 => 16,
					  ),
					  '_sow_form_id' => '56ecfdf4c41f7',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Three_Browse_By_Category_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 0,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					1 => 
					array (
					  'title' => 'Most Popular Online Courses',
					  'course_no' => '6',
					  'course_cat' => '0',
					  'course_orderby' => 'ratings',
					  'button_text' => 'Browse all Courses',
					  'button_url' => 'http://www.demos.themecycle.com/EduPress/courses',
					  '_sow_form_id' => '56ecfe02795dd',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Three_Popular_Courses_Widget',
						'grid' => 0,
						'cell' => 0,
						'id' => 1,
						'style' => 
						array (
						  'background_image_attachment' => false,
						  'background_display' => 'tile',
						),
					  ),
					),
					2 => 
					array (
					  'title' => 'Why should you choose EduPress',
					  'bgimage' => 0,
					  'bgimage_fallback' => '',
					  'services' => 
					  array (
						0 => 
						array (
						  'icon' => 'linearicons-lnr-rocket',
						  'title' => 'Superfast Support',
						  'desc' => 'Lorem Ipsum is simply dummy text the print 
				and typesetting industry. When an known 
				printer took a galley of type.',
						),
						1 => 
						array (
						  'icon' => 'linearicons-lnr-laptop-phone',
						  'title' => 'Learn on any Device',
						  'desc' => 'Lorem Ipsum is simply dummy text the print 
				and typesetting industry. When an known 
				printer took a galley of type.',
						),
						2 => 
						array (
						  'icon' => 'linearicons-lnr-license',
						  'title' => 'Certification Courses',
						  'desc' => 'Lorem Ipsum is simply dummy text the print 
				and typesetting industry. When an known 
				printer took a galley of type.',
						),
					  ),
					  '_sow_form_id' => '56ecfe114353e',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Three_Why_Should_You_Choose',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 2,
						'style' => 
						array (
						  'background_display' => 'tile',
						),
					  ),
					),
					3 => 
					array (
					  'title' => 'Upcoming Event',
					  '_sow_form_id' => '56ecfe8d9eed9',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Upcoming_Event_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 0,
						'id' => 3,
					  ),
					),
					4 => 
					array (
					  'title' => 'Instructor of the Week',
					  '_sow_form_id' => '56ecfe94ef0d7',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Instructor_Week_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 1,
						'id' => 4,
					  ),
					),
					5 => 
					array (
					  'title' => 'Free Course of the Week',
					  '_sow_form_id' => '56ecfe9d9050e',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_One_Free_Course_Week_Widget',
						'raw' => false,
						'grid' => 1,
						'cell' => 2,
						'id' => 5,
					  ),
					),
					6 => 
					array (
					  'title' => 'Latest News &amp; Updates',
					  'news_no' => '5',
					  'news_types' => '1',
					  'news_cat' => '0',
					  'news_tag' => '0',
					  '_sow_form_id' => '56ecfeb93514a',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Three_Latest_News_Updates_Widget',
						'raw' => false,
						'grid' => 2,
						'cell' => 0,
						'id' => 6,
					  ),
					),
					7 => 
					array (
					  'title' => 'Testimonials',
					  'bgimage' => 0,
					  'bgimage_fallback' => '',
					  'testi_no' => '4',
					  '_sow_form_id' => '56ecff01d86f0',
					  'panels_info' => 
					  array (
						'class' => 'Edupress_Ecommerce_Home_Three_What_People_Say_Widget',
						'raw' => false,
						'grid' => 2,
						'cell' => 0,
						'id' => 7,
					  ),
					),
				  ),
				  'grids' => 
				  array (
					0 => 
					array (
					  'cells' => 1,
					  'style' => 
					  array (
					  ),
					),
					1 => 
					array (
					  'cells' => 3,
					  'style' => 
					  array (
						'class' => 'container',
						'background_display' => 'tile',
					  ),
					),
					2 => 
					array (
					  'cells' => 1,
					  'style' => 
					  array (
					  ),
					),
				  ),
				  'grid_cells' => 
				  array (
					0 => 
					array (
					  'grid' => 0,
					  'weight' => 1,
					),
					1 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					2 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					3 => 
					array (
					  'grid' => 1,
					  'weight' => 0.333333333333333314829616256247390992939472198486328125,
					),
					4 => 
					array (
					  'grid' => 2,
					  'weight' => 1,
					),
				  ),
	);
	
	$layouts['about-us'] = array(
        // We'll add a title field
        'name' => __('About Us', 'edupress'),    // Required
        'description' => __('About Us', 'edupress'),    // Optional
        'screenshot' => get_template_directory_uri() . '/inc/page-builder-widget/images/about-us.jpg',    // Optional
		 'widgets' => 
			  array (
				0 => 
				array (
				  'title' => 'We are Online Education',
				  'text' => '<p>Aliquam erat volutpatuis finibus eroslacus cursus consequat leocongue nonum its sociis natoque penatibus etmagnis disparturient montes nascetur ridiculusi muse Fusce cursus dolorid tempus. Donec vitae nunc sitamet libero dapibus finibus our  justo ullamcorper in turpis aclacinia consectetur lacus.</p>
			
			<ul class="bullet">
			<li>Etiam utpurus aliquet fermentum libero suscipit fringilla duionec nenatis is orcinonlacus fringilla.</li>
			<li>Aliquam eratvolutp atuis finibus eros lacus cursus consequat leo congue our noncongue nonvenenatis fringilla.</li>
			<li>Pellentesque quiselit necjusto blandit molestie ullamet tellus ultricies gravida nisiet posuere risus.</li>
			<li>Etiam utpurus aliquet fermentum libero suscipit fringilla duionec nenatis is orcinonlacus fringilla.</li>
			</ul>',
				  'filter' => false,
				  'panels_info' => 
				  array (
					'class' => 'WP_Widget_Text',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'style' => 
					array (
					  'background_display' => 'tile',
					),
				  ),
				),
				1 => 
				array (
				  'title' => 'Find A Course and Sign Up Today!',
				  'text' => '<img src="http://www.demos.themecycle.com/EduPress/wp-content/uploads/2016/03/find_course_img.jpg" alt="" />
			<p>Pellentesque quiselitnec justo blandit molestieullam etellus ultricies grvidanisi is etposuere risused id neque magna. Mauris dposuere telus.</p>
			<a class="btn btn-orange btn-large" href="#">View Online Courses <i class="lnr lnr-arrow-right"></i></a>',
				  'filter' => false,
				  'panels_info' => 
				  array (
					'class' => 'WP_Widget_Text',
					'raw' => false,
					'grid' => 0,
					'cell' => 1,
					'id' => 1,
					'style' => 
					array (
					  'background_display' => 'tile',
					),
				  ),
				),
				2 => 
				array (
				  'title' => 'How It Works?',
				  'desc' => 'Quisque varius vitae dolor eget pellentesque Integer ultricies velitleo vestibulum feugiat mauris sollicitudin porttitor finibus liqultrices metus.',
				  'features' => 
				  array (
					0 => 
					array (
					  'icon' => 'fontawesome-search-plus',
					  'title' => 'Find Your Course',
					  'desc' => 'Lorem Ipsum is simply dummy text of the typesetting when an unknown printerand scrambled.',
					  'bgcolor' => '#e91e63',
					),
					1 => 
					array (
					  'icon' => 'fontawesome-edit',
					  'title' => 'Make Your Schedule',
					  'desc' => 'Lorem Ipsum is simply dummy text of the typesetting when an unknown printerand scrambled.',
					  'bgcolor' => '#03a9f4',
					),
					2 => 
					array (
					  'icon' => 'fontawesome-book',
					  'title' => 'Start Learning',
					  'desc' => 'Lorem Ipsum is simply dummy text of the typesetting when an unknown printerand scrambled.',
					  'bgcolor' => '#673ab7',
					),
				  ),
				  'text' => 'Want to Start Learning Online Today?',
				  'buttontext' => 'Sign Up Today',
				  'buttonurl' => 'http://www.demos.themecycle.com/EduPress/courses-signup/',
				  '_sow_form_id' => '56ea66713a326',
				  'panels_info' => 
				  array (
					'class' => 'Edupress_Ecommerce_About_US_How_It_Works_Widget',
					'raw' => false,
					'grid' => 1,
					'cell' => 0,
					'id' => 2,
					'style' => 
					array (
					  'background_display' => 'tile',
					),
				  ),
				),
				3 => 
				array (
				  'title' => 'Meet Our Teachers',
				  'orderby' => 'registered',
				  'order' => 'DESC',
				  '_sow_form_id' => '56ea685ed921f',
				  'panels_info' => 
				  array (
					'class' => 'Edupress_Ecommerce_About_US_Meet_Our_Teachers_Widget',
					'grid' => 2,
					'cell' => 0,
					'id' => 3,
					'style' => 
					array (
					  'background_image_attachment' => false,
					  'background_display' => 'tile',
					),
				  ),
				),
				4 => 
				array (
				  'title' => 'Partnering With Us',
				  'partners' => 
				  array (
					0 => 
					array (
					  'title' => 'Acadamic partner',
					  'desc' => 'Etiam ut purus aliquet fermentum libero suscipit its  fringilla duionec venenatis orcinon lacus fringilla ace laoreet est fermentum ullam molestie vulputate ours iaculis eterat at ullamcorper dictum risus.',
					),
					1 => 
					array (
					  'title' => 'Community Partner',
					  'desc' => 'Dictum idtex euismod bibendum auris idmetus oure ipsum enean placerat aliquet frgillasit amet nisiquis risus auctor posuerequis inerat Sed iaculis tortor its mpurus tincidunt eget placera.',
					),
					2 => 
					array (
					  'title' => 'Advisory Board Members',
					  'desc' => 'Etiam ut purus aliquet fermentum libero suscipit its  fringilla duionec venenatis orcinon lacus fringilla ace laoreet est fermentum ullam molestie vulputate ours iaculis eterat at ullamcorper dictum risus.',
					),
				  ),
				  '_sow_form_id' => '56ea6873464ba',
				  'panels_info' => 
				  array (
					'class' => 'Edupress_Ecommerce_About_US_Partnering_With_Us_Widget',
					'grid' => 2,
					'cell' => 0,
					'id' => 4,
					'style' => 
					array (
					  'background_image_attachment' => false,
					  'background_display' => 'tile',
					),
				  ),
				),
			  ),
			  'grids' => 
			  array (
				0 => 
				array (
				  'cells' => 2,
				  'style' => 
				  array (
					'class' => 'container',
					'background_display' => 'tile',
				  ),
				),
				1 => 
				array (
				  'cells' => 1,
				  'style' => 
				  array (
				  ),
				),
				2 => 
				array (
				  'cells' => 1,
				  'style' => 
				  array (
					'class' => 'container',
					'background_image_attachment' => false,
					'background_display' => 'tile',
				  ),
				),
			  ),
			  'grid_cells' => 
			  array (
				0 => 
				array (
				  'grid' => 0,
				  'weight' => 0.5,
				),
				1 => 
				array (
				  'grid' => 0,
				  'weight' => 0.5,
				),
				2 => 
				array (
				  'grid' => 1,
				  'weight' => 1,
				),
				3 => 
				array (
				  'grid' => 2,
				  'weight' => 1,
				),
			  ),
			);
			
	
	
	$layouts['plans-and-pricing'] = array(
        // We'll add a title field
        'name' => __('Plans And Pricing', 'edupress'),    // Required
        'description' => __('Plans And Pricing', 'edupress'),    // Optional
        'screenshot' => get_template_directory_uri() . '/inc/page-builder-widget/images/plans-and-pricing.jpg',    // Optional
		'widgets' => 
			  array (
				0 => 
				array (
				  'columns' => 
				  array (
					0 => 
					array (
					  'title' => '30 days Free Trial',
					  'cur' => '$',
					  'price' => '0',
					  'per' => 'mo.',
					  'subtitle' => 'For only free verison',
					  'button' => 'Enroll Now',
					  'url' => '#',
					  'bg_color' => '#e84f83',
					  'features' => 
					  array (
						0 => 
						array (
						  'text' => 'Maecenas cursus mauris et',
						  'icon_new' => 'fontawesome-gear',
						),
						1 => 
						array (
						  'text' => 'Aliquam ac erat volutpat libero',
						  'icon_new' => 'fontawesome-check-square-o',
						),
						2 => 
						array (
						  'text' => 'Lorem ipsum dolor sit amet',
						  'icon_new' => 'fontawesome-star',
						),
						3 => 
						array (
						  'text' => 'Morbi urna tincidunt eleifend',
						  'icon_new' => 'fontawesome-jsfiddle',
						),
					  ),
					),
					1 => 
					array (
					  'title' => 'Single',
					  'cur' => '$',
					  'price' => '199',
					  'per' => 'mo.',
					  'subtitle' => 'For only free verison',
					  'button' => 'Enroll Now',
					  'url' => '#',
					  'bg_color' => '#53bae8',
					  'features' => 
					  array (
						0 => 
						array (
						  'text' => 'Maecenas cursus mauris et',
						  'icon_new' => 'fontawesome-gear',
						),
						1 => 
						array (
						  'text' => 'Aliquam ac erat volutpat libero',
						  'icon_new' => 'fontawesome-check-square-o',
						),
						2 => 
						array (
						  'text' => 'Lorem ipsum dolor sit amet',
						  'icon_new' => 'fontawesome-star',
						),
						3 => 
						array (
						  'text' => 'Morbi urna tincidunt eleifend',
						  'icon_new' => 'fontawesome-jsfiddle',
						),
					  ),
					),
					2 => 
					array (
					  'title' => 'Team',
					  'cur' => '$',
					  'price' => '299',
					  'per' => 'mo.',
					  'subtitle' => 'For only free verison',
					  'button' => 'Enroll Now',
					  'url' => '#',
					  'bg_color' => '#51ca56',
					  'features' => 
					  array (
						0 => 
						array (
						  'text' => 'Maecenas cursus mauris et',
						  'icon_new' => 'fontawesome-gear',
						),
						1 => 
						array (
						  'text' => 'Aliquam ac erat volutpat libero',
						  'icon_new' => 'fontawesome-check-square-o',
						),
						2 => 
						array (
						  'text' => 'Lorem ipsum dolor sit amet',
						  'icon_new' => 'fontawesome-star',
						),
						3 => 
						array (
						  'text' => 'Morbi urna tincidunt eleifend',
						  'icon_new' => 'fontawesome-jsfiddle',
						),
					  ),
					),
				  ),
				  '_sow_form_id' => '56ea6e5299131',
				  'panels_info' => 
				  array (
					'class' => 'Edupress_Price_Table_Widget',
					'raw' => false,
					'grid' => 0,
					'cell' => 0,
					'id' => 0,
					'style' => 
					array (
					  'background_display' => 'tile',
					),
				  ),
				),
			  ),
			  'grids' => 
			  array (
				0 => 
				array (
				  'cells' => 1,
				  'style' => 
				  array (
					'class' => 'container',
					'background_image_attachment' => false,
					'background_display' => 'tile',
				  ),
				),
			  ),
			  'grid_cells' => 
			  array (
				0 => 
				array (
				  'grid' => 0,
				  'weight' => 1,
				),
			  ),
	);
			
			
			
    return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'edupress_ecommerce_prebuilt_layouts');



?>