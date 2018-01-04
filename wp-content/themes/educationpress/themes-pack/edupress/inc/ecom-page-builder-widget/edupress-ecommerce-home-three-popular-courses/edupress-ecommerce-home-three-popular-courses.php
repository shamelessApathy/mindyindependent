<?php
/*
Widget Name: Home Three Popular Courses 
Description: Popular Courses for home page three'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_Home_Three_Popular_Courses_Widget' ) ):

class Edupress_Ecommerce_Home_Three_Popular_Courses_Widget extends SiteOrigin_Widget {
	function __construct() {
		

    parent::__construct(
        'edupress-ecommerce-home-three-popular-courses',

        esc_html__('Home Three Popular Courses', 'edupress'),

        array(
            'description' => esc_html__('Popular Courses for home page three', 'edupress'),
			'panels_groups' => array('edupressecommercehome3'),
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
		$temp_arr = array('0' => esc_html__('Select Category', 'edupress'));
		$course_cat=get_terms( 'product_cat', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($course_cat) )
			$all_cat=$temp_arr + $course_cat;
		else
			$all_cat=$temp_arr;
		return array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => 'Most Popular Online Courses'
            ),
			'course_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Courses', 'edupress' ),
				'default' => '6',
				'options' => array(
					'3' => esc_html__( '3', 'edupress' ),
					'6' => esc_html__( '6', 'edupress' ),
					'9' => esc_html__( '9', 'edupress' ),
					'12' => esc_html__( '12', 'edupress' ),
				)
    		),
			'course_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a course categories', 'edupress' ),
				'options' =>  $all_cat,
    		),
			'course_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'ratings',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'popular' => esc_html__('Popular Course By Enrolled', 'edupress'),
					'ratings' => esc_html__('Popular Course By Ratings', 'edupress'),
					'rand' => esc_html__('Random Order', 'edupress'),
					'title' => esc_html__('Order By Title', 'edupress'),
				),
    		),
			'button_text' => array(
                'type' => 'text',
                'label' => esc_html__('Button Text', 'edupress'),
                'default' => 'Browse all Courses'
            ),
			'button_url' => array(
                'type' => 'link',
                'label' => esc_html__('Button URL', 'edupress'),
                'default' => home_url() . '/' . get_option( 'coursepress_course_slug', 'courses' ),
            ),
        );
		
	}
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

siteorigin_widget_register('edupress-ecommerce-home-three-popular-courses', __FILE__, 'Edupress_Ecommerce_Home_Three_Popular_Courses_Widget');
endif;
?>