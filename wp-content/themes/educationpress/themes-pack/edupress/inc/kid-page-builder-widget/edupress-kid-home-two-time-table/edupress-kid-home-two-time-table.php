<?php
/*
Widget Name: Home Two Timetable
Description: Timetable for Home Page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Timetable' ) ):
class Edupress_Kid_Home_Two_Timetable extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-kid-home-two-time-table',

        esc_html__('Home Two Timetable', 'edupress'),


        array(
            'description' => esc_html__('Home page two timetable.', 'edupress'),
			'panels_groups' => array('edupresskidhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

		array(
		'timetables' => array(
			'type' => 'repeater',
			'label' => esc_html__( 'Timetables' , 'edupress' ),
			'item_name'  => esc_html__( 'Timetable', 'edupress' ),
			'item_label' => array(
				'selector'     => "[id*='title']",
				'update_event' => 'change',
				'value_method' => 'val'
			),
			'fields' => array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Title', 'edupress' ),
					'default' =>  esc_html('Mon - Wed'),
				),
				'time' => array(
					'type' => 'text',
					'label' => esc_html__( 'Time', 'edupress' ),
					'default' =>  esc_html('07:00 AM - 01:30 PM'),
				),
				'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),
					'default' =>  esc_html('When an unknown printer took a galley of type and scrambled specimen book.'),
				),
			),
			
		),
		
		
	),
			
			plugin_dir_path(__FILE__)
		);
	}
		
		

	
	
	function get_template_variables( $instance, $args ){
		
		return array(
			'timetables' => !empty($instance['timetables']) ? $instance['timetables'] : array(),
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-two-time-table', __FILE__, 'Edupress_Kid_Home_Two_Timetable');
endif;
?>