<?php
function educationpress_remove_widgets($widgets){
    unset($widgets['SiteOrigin_Widget_PriceTable_Widget']);
	unset($widgets['educationpress_Search_Cat_Filter_Widget']);
	unset($widgets['educationpress_Search_Lang_Filter_Widget']);
	unset($widgets['educationpress_Search_Price_Filter_Widget']);
	unset($widgets['educationpress_Course_Search_Widget']);
	unset($widgets['educationpress_Courses_Widget']);
	unset($widgets['educationpress_Recent_Events_Widget']);
	unset($widgets['educationpress_Recent_Posts_Widget']);
	unset($widgets['educationpress_Similar_Courses_Widget']);
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'educationpress_remove_widgets');
function educationpress_unregister_widgets()
{
	global $pagenow;
	if ($pagenow == 'widgets.php'){
	unregister_widget('SiteOrigin_Widget_PriceTable_Widget');
	unregister_widget('About_US_How_It_Works_Widget');
	unregister_widget('About_US_Meet_Our_Teachers_Widget');
	unregister_widget('About_US_Partnering_With_Us_Widget');
	unregister_widget('Edupress_Price_Table_Widget');
	unregister_widget('Home_One_Free_Course_Week_Widget');
	unregister_widget('Home_One_Instructor_Week_Widget');
	unregister_widget('Home_One_Latest_News_Updates_Widget');
	unregister_widget('Home_One_Popular_Courses_Widget');
	unregister_widget('Home_One_Search_By_Category_Widget');
	unregister_widget('Home_One_Search_Form_Widget');
	unregister_widget('Home_One_Sepretor_Widget');
	unregister_widget('Home_One_Slider_Widget');
	unregister_widget('Home_One_Upcoming_Event_Widget');
	unregister_widget('Home_One_What_People_Say_Widget');
	unregister_widget('Home_One_Why_Should_You_Choose');
	unregister_widget('Home_Three_Browse_By_Category_Widget');
	unregister_widget('Home_Three_Latest_News_Updates_Widget');
	unregister_widget('Home_Three_Popular_Courses_Widget');
	unregister_widget('Home_Three_What_People_Say_Widget');
	unregister_widget('Home_Three_Why_Should_You_Choose');
	unregister_widget('Home_Two_Popular_Courses_Widget');
	unregister_widget('Home_Two_Recent_Post_Widget');
	unregister_widget('Home_Two_Search_Form_Widget');
	unregister_widget('Home_Two_Slider_Widget');
	unregister_widget('Home_Two_What_People_Say_Widget');
	}
}
add_action( 'widgets_init','educationpress_unregister_widgets', 11 );	
function educationpress_add_widgets_collection($folders){
    $folders = apply_filters( 'educationpress_siteorigin_pb_before_folders', $folders);	
	
	if( is_child_theme() )
	{
		$path = get_stylesheet_directory() . '/inc/page-builder-widget/';
		
		if( is_dir($path) )
		{
			$folders[] = $path;	
		}
		
	}
	$folders[] = get_template_directory() . '/inc/page-builder-widget/';
	
	$folders = apply_filters( 'educationpress_siteorigin_pb_after_folders', $folders);	
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'educationpress_add_widgets_collection');

function educationpress_icon_families_filter( $icon_families ) {
	$icon_arr= array( 'lnr-home' => '&#xe800;', 
'lnr-apartment' => '&#xe801;', 
'lnr-pencil' => '&#xe802;', 
'lnr-magic-wand' => '&#xe803;', 
'lnr-drop' => '&#xe804;', 
'lnr-lighter' => '&#xe805;', 
'lnr-poop' => '&#xe806;', 
'lnr-sun' => '&#xe807;', 
'lnr-moon' => '&#xe808;', 
'lnr-cloud' => '&#xe809;', 
'lnr-cloud-upload' => '&#xe80a;', 
'lnr-cloud-download' => '&#xe80b;', 
'lnr-cloud-sync' => '&#xe80c;', 
'lnr-cloud-check' => '&#xe80d;', 
'lnr-database' => '&#xe80e;', 
'lnr-lock' => '&#xe80f;', 
'lnr-cog' => '&#xe810;', 
'lnr-trash' => '&#xe811;', 
'lnr-dice' => '&#xe812;', 
'lnr-heart' => '&#xe813;', 
'lnr-star' => '&#xe814;', 
'lnr-star-half' => '&#xe815;', 
'lnr-star-empty' => '&#xe816;', 
'lnr-flag' => '&#xe817;', 
'lnr-envelope' => '&#xe818;', 
'lnr-paperclip' => '&#xe819;', 
'lnr-inbox' => '&#xe81a;', 
'lnr-eye' => '&#xe81b;', 
'lnr-printer' => '&#xe81c;', 
'lnr-file-empty' => '&#xe81d;', 
'lnr-file-add' => '&#xe81e;', 
'lnr-enter' => '&#xe81f;', 
'lnr-exit' => '&#xe820;', 
'lnr-graduation-hat' => '&#xe821;', 
'lnr-license' => '&#xe822;', 
'lnr-music-note' => '&#xe823;', 
'lnr-film-play' => '&#xe824;', 
'lnr-camera-video' => '&#xe825;', 
'lnr-camera' => '&#xe826;', 
'lnr-picture' => '&#xe827;', 
'lnr-book' => '&#xe828;', 
'lnr-bookmark' => '&#xe829;', 
'lnr-user' => '&#xe82a;', 
'lnr-users' => '&#xe82b;', 
'lnr-shirt' => '&#xe82c;', 
'lnr-store' => '&#xe82d;', 
'lnr-cart' => '&#xe82e;', 
'lnr-tag' => '&#xe82f;', 
'lnr-phone-handset' => '&#xe830;', 
'lnr-phone' => '&#xe831;', 
'lnr-pushpin' => '&#xe832;', 
'lnr-map-marker' => '&#xe833;', 
'lnr-map' => '&#xe834;', 
'lnr-location' => '&#xe835;', 
'lnr-calendar-full' => '&#xe836;', 
'lnr-keyboard' => '&#xe837;', 
'lnr-spell-check' => '&#xe838;', 
'lnr-screen' => '&#xe839;', 
'lnr-smartphone' => '&#xe83a;', 
'lnr-tablet' => '&#xe83b;', 
'lnr-laptop' => '&#xe83c;', 
'lnr-laptop-phone' => '&#xe83d;', 
'lnr-power-switch' => '&#xe83e;', 
'lnr-bubble' => '&#xe83f;', 
'lnr-heart-pulse' => '&#xe840;', 
'lnr-construction' => '&#xe841;', 
'lnr-pie-chart' => '&#xe842;', 
'lnr-chart-bars' => '&#xe843;', 
'lnr-gift' => '&#xe844;', 
'lnr-diamond' => '&#xe845;', 
'lnr-linearicons' => '&#xe846;', 
'lnr-dinner' => '&#xe847;', 
'lnr-coffee-cup' => '&#xe848;', 
'lnr-leaf' => '&#xe849;', 
'lnr-paw' => '&#xe84a;', 
'lnr-rocket' => '&#xe84b;', 
'lnr-briefcase' => '&#xe84c;', 
'lnr-bus' => '&#xe84d;', 
'lnr-car' => '&#xe84e;', 
'lnr-train' => '&#xe84f;', 
'lnr-bicycle' => '&#xe850;', 
'lnr-wheelchair' => '&#xe851;', 
'lnr-select' => '&#xe852;', 
'lnr-earth' => '&#xe853;', 
'lnr-smile' => '&#xe854;', 
'lnr-sad' => '&#xe855;', 
'lnr-neutral' => '&#xe856;', 
'lnr-mustache' => '&#xe857;', 
'lnr-alarm' => '&#xe858;', 
'lnr-bullhorn' => '&#xe859;', 
'lnr-volume-high' => '&#xe85a;', 
'lnr-volume-medium' => '&#xe85b;', 
'lnr-volume-low' => '&#xe85c;', 
'lnr-volume' => '&#xe85d;', 
'lnr-mic' => '&#xe85e;', 
'lnr-hourglass' => '&#xe85f;', 
'lnr-undo' => '&#xe860;', 
'lnr-redo' => '&#xe861;', 
'lnr-sync' => '&#xe862;', 
'lnr-history' => '&#xe863;', 
'lnr-clock' => '&#xe864;', 
'lnr-download' => '&#xe865;', 
'lnr-upload' => '&#xe866;', 
'lnr-enter-down' => '&#xe867;', 
'lnr-exit-up' => '&#xe868;', 
'lnr-bug' => '&#xe869;', 
'lnr-code' => '&#xe86a;', 
'lnr-link' => '&#xe86b;', 
'lnr-unlink' => '&#xe86c;', 
'lnr-thumbs-up' => '&#xe86d;', 
'lnr-thumbs-down' => '&#xe86e;', 
'lnr-magnifier' => '&#xe86f;', 
'lnr-cross' => '&#xe870;', 
'lnr-menu' => '&#xe871;', 
'lnr-list' => '&#xe872;', 
'lnr-chevron-up' => '&#xe873;', 
'lnr-chevron-down' => '&#xe874;', 
'lnr-chevron-left' => '&#xe875;', 
'lnr-chevron-right' => '&#xe876;', 
'lnr-arrow-up' => '&#xe877;', 
'lnr-arrow-down' => '&#xe878;', 
'lnr-arrow-left' => '&#xe879;', 
'lnr-arrow-right' => '&#xe87a;', 
'lnr-move' => '&#xe87b;', 
'lnr-warning' => '&#xe87c;', 
'lnr-question-circle' => '&#xe87d;', 
'lnr-menu-circle' => '&#xe87e;', 
'lnr-checkmark-circle' => '&#xe87f;', 
'lnr-cross-circle' => '&#xe880;', 
'lnr-plus-circle' => '&#xe881;', 
'lnr-circle-minus' => '&#xe882;', 
'lnr-arrow-up-circle' => '&#xe883;', 
'lnr-arrow-down-circle' => '&#xe884;', 
'lnr-arrow-left-circle' => '&#xe885;', 
'lnr-arrow-right-circle' => '&#xe886;', 
'lnr-chevron-up-circle' => '&#xe887;', 
'lnr-chevron-down-circle' => '&#xe888;', 
'lnr-chevron-left-circle' => '&#xe889;', 
'lnr-chevron-right-circle' => '&#xe88a;', 
'lnr-crop' => '&#xe88b;', 
'lnr-frame-expand' => '&#xe88c;', 
'lnr-frame-contract' => '&#xe88d;', 
'lnr-layers' => '&#xe88e;', 
'lnr-funnel' => '&#xe88f;', 
'lnr-text-format' => '&#xe890;', 
'lnr-text-format-remove' => '&#xe891;', 
'lnr-text-size' => '&#xe892;', 
'lnr-bold' => '&#xe893;', 
'lnr-italic' => '&#xe894;', 
'lnr-underline' => '&#xe895;', 
'lnr-strikethrough' => '&#xe896;', 
'lnr-highlight' => '&#xe897;', 
'lnr-text-align-left' => '&#xe898;', 
'lnr-text-align-center' => '&#xe899;', 
'lnr-text-align-right' => '&#xe89a;', 
'lnr-text-align-justify' => '&#xe89b;', 
'lnr-line-spacing' => '&#xe89c;', 
'lnr-indent-increase' => '&#xe89d;', 
'lnr-indent-decrease' => '&#xe89e;', 
'lnr-pilcrow' => '&#xe89f;', 
'lnr-direction-ltr' => '&#xe8a0;', 
'lnr-direction-rtl' => '&#xe8a1;', 
'lnr-page-break' => '&#xe8a2;', 
'lnr-sort-alpha-asc' => '&#xe8a3;', 
'lnr-sort-amount-asc' => '&#xe8a4;', 
'lnr-hand' => '&#xe8a5;', 
'lnr-pointer-up' => '&#xe8a6;', 
'lnr-pointer-right' => '&#xe8a7;', 
'lnr-pointer-down' => '&#xe8a8;', 
'lnr-pointer-left' => '&#xe8a9;', 
);
    $icon_families['linearicons'] = array(
        'name' => esc_html__( 'linearicons', 'educationpress' ),
        'style_uri' =>  get_template_directory_uri() . '/assets/css/linearicons-admin.css',
        'icons' => $icon_arr,
		
    );
	return $icon_families;
}
add_filter( 'siteorigin_widgets_icon_families', 'educationpress_icon_families_filter' );

function educationpress_filter_active_widgets($active){
	$active['home-one-slider'] = true;
	$active['home-two-slider'] = true;
	$active['home-one-search-form'] = true;
	$active['home-two-search-form'] = true;
	$active['home-one-search-by-category'] = true;
	$active['home-three-browse-by-category'] = true;
	$active['home-one-why-choose'] = true;
	$active['home-three-why-choose'] = true;
	$active['home-one-sepretor'] = true;
	$active['home-one-popular-courses'] = true;
	$active['home-two-popular-courses'] = true;
	$active['home-three-popular-courses'] = true;
	$active['home-one-latest-news-updates'] = true;
	$active['home-three-latest-news-updates'] = true;
	$active['home-one-what-people-say'] = true;
	$active['home-two-what-people-say'] = true;
	$active['home-two-recent-posts'] = true;
	$active['home-three-what-people-say'] = true;
	$active['home-one-free-course-week'] = true;
	$active['home-one-instructor-week'] = true;
	$active['home-one-upcoming-event'] = true;
	$active['aboutus-how-it-works'] = true;
	$active['aboutus-meet-our-teachers'] = true;
	$active['aboutus-partnering-with-us'] = true;
	$active['edupress-price-table'] = true;
	    return $active;
}
add_filter('siteorigin_widgets_active_widgets', 'educationpress_filter_active_widgets');

function educationpress_add_widget_tabs($tabs) {
	$tabs[] = array(
        'title' => esc_html__('About Us', 'educationpress'),
        'filter' => array(
            'groups' => array('aboutus')
        )
    );
    $tabs[] = array(
        'title' => esc_html__('Home Page One', 'educationpress'),
        'filter' => array(
            'groups' => array('educationpresshome1')
        )
    );
	 $tabs[] = array(
        'title' => esc_html__('Home Page Two', 'educationpress'),
        'filter' => array(
            'groups' => array('educationpresshome2')
        )
    );
	 $tabs[] = array(
        'title' => esc_html__('Home Page Three', 'educationpress'),
        'filter' => array(
            'groups' => array('educationpresshome3')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'educationpress_add_widget_tabs', 20);


function educationpress_prebuilt_layouts($layouts){
    $layouts['home-page1'] = array(
        // We'll add a title field
        'name' => __('Home Page 1', 'educationpress'),    // Required
        'description' => __('Home Page 1', 'educationpress'),    // Optional
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
						'class' => 'Home_One_Slider_Widget',
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
						'class' => 'Home_One_Search_Form_Widget',
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
						'class' => 'Home_One_Sepretor_Widget',
						'raw' => false,
						'grid' => 0,
						'cell' => 0,
						'id' => 2,
					  ),
					),
					3 => 
					array (
					  'title' => 'Search By Category',
					  'course_cat' => 
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
						'class' => 'Home_One_Search_By_Category_Widget',
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
					  'button_url' => 'http://www.demos.themecycle.com/educationpress/courses',
					  '_sow_form_id' => '56ea5b5a09448',
					  'panels_info' => 
					  array (
						'class' => 'Home_One_Popular_Courses_Widget',
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
					  'title' => 'Why should you choose EducationPress',
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
						'class' => 'Home_One_Why_Should_You_Choose',
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
						'class' => 'Home_One_Latest_News_Updates_Widget',
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
						'class' => 'Home_One_What_People_Say_Widget',
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
						'class' => 'Home_One_Upcoming_Event_Widget',
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
						'class' => 'Home_One_Instructor_Week_Widget',
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
						'class' => 'Home_One_Free_Course_Week_Widget',
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
        'name' => __('Home Page 2', 'educationpress'),    // Required
        'description' => __('Home Page 2', 'educationpress'),    // Optional
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
						'class' => 'Home_Two_Slider_Widget',
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
						'class' => 'Home_Two_Search_Form_Widget',
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
					  'button_url' => 'http://www.demos.themecycle.com/educationpress/courses',
					  '_sow_form_id' => '56ecfd498bfd3',
					  'panels_info' => 
					  array (
						'class' => 'Home_Two_Popular_Courses_Widget',
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
						'class' => 'Home_Two_What_People_Say_Widget',
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
						'class' => 'Home_One_Upcoming_Event_Widget',
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
						'class' => 'Home_One_Instructor_Week_Widget',
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
						'class' => 'Home_Two_Recent_Post_Widget',
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
        'name' => __('Home Page 3', 'educationpress'),    // Required
        'description' => __('Home Page 3', 'educationpress'),    // Optional
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
						'class' => 'Home_Three_Browse_By_Category_Widget',
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
					  'button_url' => 'http://www.demos.themecycle.com/educationpress/courses',
					  '_sow_form_id' => '56ecfe02795dd',
					  'panels_info' => 
					  array (
						'class' => 'Home_Three_Popular_Courses_Widget',
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
					  'title' => 'Why should you choose EducationPress',
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
						'class' => 'Home_Three_Why_Should_You_Choose',
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
						'class' => 'Home_One_Upcoming_Event_Widget',
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
						'class' => 'Home_One_Instructor_Week_Widget',
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
						'class' => 'Home_One_Free_Course_Week_Widget',
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
						'class' => 'Home_Three_Latest_News_Updates_Widget',
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
						'class' => 'Home_Three_What_People_Say_Widget',
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
        'name' => __('About Us', 'educationpress'),    // Required
        'description' => __('About Us', 'educationpress'),    // Optional
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
				  'text' => '<img src="http://www.demos.themecycle.com/educationpress/wp-content/uploads/2016/03/find_course_img.jpg" alt="" />
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
				  'buttonurl' => 'http://www.demos.themecycle.com/educationpress/courses-signup/',
				  '_sow_form_id' => '56ea66713a326',
				  'panels_info' => 
				  array (
					'class' => 'About_US_How_It_Works_Widget',
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
					'class' => 'About_US_Meet_Our_Teachers_Widget',
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
					'class' => 'About_US_Partnering_With_Us_Widget',
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
        'name' => __('Plans And Pricing', 'educationpress'),    // Required
        'description' => __('Plans And Pricing', 'educationpress'),    // Optional
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
add_filter('siteorigin_panels_prebuilt_layouts', 'educationpress_prebuilt_layouts');

?>