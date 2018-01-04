<?php
/*
Widget Name: Home Teo Latest Events 
Description: Latest Events for home page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_Two_Latest_Event' ) ):
class Edupress_University_Home_Two_Latest_Event extends SiteOrigin_Widget {
	function __construct() {

	
    parent::__construct(
        'edupress-university-home-two-latest-event',

        esc_html__('Home Two Latest Events', 'edupress'),

        array(
            'description' => esc_html__('Latest Events for home page two', 'edupress'),
			'panels_groups' =>  array('edupressuniversityhome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),
		
        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Event Title', 'edupress'),
                'default' => esc_html('Latest Events'),
            ),
			'event_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Events', 'edupress' ),
				'default' => '3',
				'options' => edupress_get_num_array(),
    		),
        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'event_no' => $instance['event_no'],
		);
	}	

  
}

siteorigin_widget_register('edupress-university-home-two-latest-event', __FILE__, 'Edupress_University_Home_Two_Latest_Event');
endif;
?>