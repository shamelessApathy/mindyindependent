<?php
/*
Widget Name: Home Free Course of the Week 
Description: Free Course of the Week for home page'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_Home_One_Free_Course_Week_Widget' ) ):

class Edupress_Ecommerce_Home_One_Free_Course_Week_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-home-one-free-course-week',

        esc_html__('Home Free Course of the Week', 'edupress'),

        array(
            'description' => esc_html__('Free Course of the Week for home page', 'edupress'),
			'panels_groups' =>  array('edupressecommercehome1','edupressecommercehome2','edupressecommercehome3'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Course Title', 'edupress'),
                'default' => 'Free Course of the Week'
            ),
        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
		);
	}

  
}

siteorigin_widget_register('edupress-ecommerce-home-one-free-course-week', __FILE__, 'Edupress_Ecommerce_Home_One_Free_Course_Week_Widget');
endif;
?>