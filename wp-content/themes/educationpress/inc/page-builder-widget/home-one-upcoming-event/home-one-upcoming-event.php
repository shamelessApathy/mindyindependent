<?php
/*
Widget Name: Home Upcoming Event 
Description: Upcoming Event for home page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_One_Upcoming_Event_Widget' ) ):

class Home_One_Upcoming_Event_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-one-upcoming-event',

        esc_html__('Home Upcoming Event', 'educationpress'),

        array(
            'description' => esc_html__('Upcoming Event for home page', 'educationpress'),
			'panels_groups' =>  array('educationpresshome1','educationpresshome2','educationpresshome3'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Event Title', 'educationpress'),
                'default' => 'Upcoming Event'
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

siteorigin_widget_register('home-one-upcoming-event', __FILE__, 'Home_One_Upcoming_Event_Widget');
endif;

?>