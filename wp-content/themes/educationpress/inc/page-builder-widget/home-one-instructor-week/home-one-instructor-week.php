<?php
/*
Widget Name: Home Instructor of the Week 
Description: Instructor of the Week for home page'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_One_Instructor_Week_Widget' ) ):

class Home_One_Instructor_Week_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-one-instructor-week',

        esc_html__('Home Instructor of the Week', 'educationpress'),

        array(
            'description' => esc_html__('Instructor of the Week for home page', 'educationpress'),
			'panels_groups' =>  array('educationpresshome1','educationpresshome2','educationpresshome3'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Instructor Title', 'educationpress'),
                'default' => 'Instructor of the Week'
            ),
			'display_phone' => array(
				'type' => 'checkbox',
				'label' => __( 'Display Phone', 'educationpress' ),
				'default' => true
			),
			'display_email' => array(
				'type' => 'checkbox',
				'label' => __( 'Display Email', 'educationpress' ),
				'default' => true
			),
			
			
        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'display_phone' => $instance['display_phone'],
			'display_email'  => $instance['display_email'],
		);
	}
	

  
}

siteorigin_widget_register('home-one-instructor-week', __FILE__, 'Home_One_Instructor_Week_Widget');
endif;
?>