<?php
/*
Widget Name: Home One Text Banner 
Description: Text Banner for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_One_Text_Banner_Widget' ) ):
class Edupress_University_Home_One_Text_Banner_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-university-home-one-text-banner',

        esc_html__('Home One Text Banner', 'edupress'),


        array(
            'description' => esc_html__('Home One Text Banner', 'edupress'),
			'panels_groups' => array('edupressuniversityhome1'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
            'bgimage' => array(
				'type' => 'media',
				'library' => 'image',
				'label' => esc_html__('Background Image 1970x658 px', 'edupress'),
				'fallback' => true,
				'desc' => esc_html__( 'BackGround image size should be 1970 X 348', 'edupress' ),
			),
			'icon' => array(
				'type' => 'icon',
				'label' => esc_html__('1st Icon', 'edupress'),
				'default' => 'linearicons-lnr-graduation-hat',
			),
			'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),		
					'default' => 'It has survived not only five centuries, but also the leap into electronic typesetting,
remaining essentially unchanged.',			
				),
			
        ),
       


        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'bgimage' =>$instance['bgimage'],
			'icon' => $instance['icon'],
			'desc' => $instance['desc'],
					
		);
	}
}

siteorigin_widget_register('edupress-university-home-one-text-banner', __FILE__, 'Edupress_University_Home_One_Text_Banner_Widget');
endif;
?>