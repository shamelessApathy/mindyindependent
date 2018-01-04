<?php
/*
Widget Name: Home Two Upcoming Event 
Description: Upcoming Event for home page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Upcoming_Event_Widget' ) ):
class Edupress_Kid_Home_Two_Upcoming_Event_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-kid-home-two-upcoming-event',

        esc_html__('Home Two Upcoming Event', 'edupress'),

        array(
            'description' => esc_html__('Upcoming Event for home page two', 'edupress'),
			'panels_groups' =>  array('edupresskidhome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Event Title', 'edupress'),
                'default' => esc_html('Event'),
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

siteorigin_widget_register('edupress-kid-home-two-upcoming-event', __FILE__, 'Edupress_Kid_Home_Two_Upcoming_Event_Widget');
endif;
?>