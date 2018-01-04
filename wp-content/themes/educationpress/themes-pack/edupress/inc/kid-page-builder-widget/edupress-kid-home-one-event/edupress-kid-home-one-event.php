<?php
/*
Widget Name: Home One Events 
Description: Latest Events for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_One_Event' ) ):
class Edupress_Kid_Home_One_Event extends SiteOrigin_Widget {
	function __construct() {

	
    parent::__construct(
        'edupress-kid-home-one-event',

        esc_html__('Home One Events ', 'edupress'),

        array(
            'description' => esc_html__('Events for home page one', 'edupress'),
			'panels_groups' =>  array('edupresskidhome1'),
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
		return array(
			'title_prefix' => array(
                'type' => 'text',
                'label' => esc_html__('Title Prefix', 'edupress'),
                'default' => esc_html('School'),
            ),
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Event Title', 'edupress'),
                'default' => esc_html('Events'),
            ),
			'event_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Events', 'edupress' ),
				'default' => '3',
				'options' => edupress_get_num_array(),
    		),
			'event_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'date',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'rand' => esc_html__('Random Order', 'edupress'),
					'title' => esc_html__('Order By Title', 'edupress'),
				),
    		),
			'btn_text' => array(
                'type' => 'text',
                'label' => esc_html__('Event Full View Button text', 'edupress'),
                'default' => esc_html('Know More'),
            ),
        );	
	}
	
	function get_template_variables( $instance, $args ){
		return array(
			'title_prefix' => $instance['title_prefix'],
			'title' => $instance['title'],
			'event_no' => $instance['event_no'],
			'event_orderby' => $instance['event_orderby'],
			'btn_text' => $instance['btn_text'],
		);
	}	

  
}

siteorigin_widget_register('edupress-kid-home-one-event', __FILE__, 'Edupress_Kid_Home_One_Event');
endif;
?>