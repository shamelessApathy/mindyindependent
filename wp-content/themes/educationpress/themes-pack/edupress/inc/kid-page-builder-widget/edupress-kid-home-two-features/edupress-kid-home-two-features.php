<?php
/*
Widget Name: Home Two Features
Description: Features for Home Page 2.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Features_Widget' ) ):
class Edupress_Kid_Home_Two_Features_Widget extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-kid-home-two-features',

        esc_html__('Home Two Features', 'edupress'),


        array(
            'description' => esc_html__('Home page two features.', 'edupress'),
			'panels_groups' => array('edupresskidhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

		array(
				
		'features' => array(
			'type' => 'repeater',
			'label' => esc_html__( 'Features' , 'edupress' ),
			'item_name'  => esc_html__( 'Feature', 'edupress' ),
			'item_label' => array(
				'selector'     => "[id*='title']",
				'update_event' => 'change',
				'value_method' => 'val'
			),
			'fields' => array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Feature Title', 'edupress' ),
					'default' =>  '',
				),
				'icon' => array(
					'type' => 'icon',
					'label' => esc_html__( 'Feature Icon', 'edupress' ),
					'default' => 'linearicons-lnr-smile',
				),
				'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__('Feature Description', 'edupress'),
				),
			),
			
		),
		
		
	),
			
			plugin_dir_path(__FILE__)
		);
		}
		
		

	
	
	
	function get_template_variables( $instance, $args ){
		
		return array(
			'features' => !empty($instance['features']) ? $instance['features'] : array(),
			
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-two-features', __FILE__, 'Edupress_Kid_Home_Two_Features_Widget');
endif;
?>