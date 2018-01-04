<?php
/*
Widget Name: Separator
Description: Make Vertical Space in page
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Separator_Widget' ) ):

class Edupress_Separator_Widget extends SiteOrigin_Widget {
	function __construct() {
	global $signup_url;
    parent::__construct(
        'edupress-separator',

        esc_html__('Separator', 'edupress'),


        array(
            'description' => esc_html__('Separator', 'edupress'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		false,
       

   
        
        plugin_dir_path(__FILE__)
    );
	}
	function get_widget_form(){
		
		return array(
			'height' => array(
                'type' => 'number',
                'label' => esc_html__('Height (in px)', 'edupress'),
                'default' => '50'            ),
		);
	}
	
	function get_template_variables( $instance, $args ){
		return array(
			'height' => intval($instance['height']),
		);
	}
}

siteorigin_widget_register('edupress-separator', __FILE__, 'Edupress_Separator_Widget');
endif;
?>