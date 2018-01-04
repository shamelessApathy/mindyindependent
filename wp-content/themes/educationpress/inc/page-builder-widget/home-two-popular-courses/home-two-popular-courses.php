<?php
/*
Widget Name: Home Two Popular Courses 
Description: Popular Courses for home page two'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_Two_Popular_Courses_Widget' ) ):

class Home_Two_Popular_Courses_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'home-two-popular-courses',

        esc_html__('Home Two Popular Courses', 'educationpress'),

        array(
            'description' => esc_html__('Popular Courses for home page two', 'educationpress'),
			'panels_groups' => array('educationpresshome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        false,

        plugin_dir_path(__FILE__)
    );
	}
	
	function get_widget_form() {
		$temp_arr = array('0' => esc_html__('Select Category', 'educationpress'));
		$course_cat=get_terms( 'course_category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($course_cat) )
			$all_cat= $temp_arr  + $course_cat;
		else
			$all_cat= $temp_arr;
		return array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'educationpress'),
                'default' => 'Most Popular Online Courses'
            ),
			'course_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Courses', 'educationpress' ),
				'default' => '6',
				'options' => array(
					'3' => esc_html__( '3', 'educationpress' ),
					'6' => esc_html__( '6', 'educationpress' ),
					'9' => esc_html__( '9', 'educationpress' ),
					'12' => esc_html__( '12', 'educationpress' ),
				)
    		),
			'course_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a course categories', 'educationpress' ),
				'options' =>  $all_cat,
    		),
			'course_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'educationpress' ),
				'default' => 'ratings',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'educationpress'),
					'popular' => esc_html__('Popular Course By Enrolled', 'educationpress'),
					'ratings' => esc_html__('Popular Course By Ratings', 'educationpress'),
					'rand' => esc_html__('Random Order', 'educationpress'),
					'title' => esc_html__('Order By Title', 'educationpress'),
				),
    		),
			'button_text' => array(
                'type' => 'text',
                'label' => esc_html__('Button Text', 'educationpress'),
                'default' => 'Browse all Courses'
            ),
			'button_url' => array(
                'type' => 'link',
                'label' => esc_html__('Button URL', 'educationpress'),
                'default' => home_url() . '/' . get_option( 'coursepress_course_slug', 'courses' ),
            ),
        );	
		
	}
	
	/*
	function modify_form( $form ){
		$temp_arr = array('0' => esc_html__('Select Category', 'educationpress'));
		$course_cat=get_terms( 'course_category', 'orderby=name&fields=id=>name&hide_empty=0' );
		$all_cat= array_merge($temp_arr,$course_cat );
		$form['course_cat']['options'] = $all_cat;
		return $form;
	}
	*/
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'course_no' => $instance['course_no'],
			'course_cat' => $instance['course_cat'],
			'course_orderby' => $instance['course_orderby'],
			'button_text' => $instance['button_text'],
			'button_url' => $instance['button_url'],
		);
	}

  
}

siteorigin_widget_register('home-two-popular-courses', __FILE__, 'Home_Two_Popular_Courses_Widget');
endif;
?>