<?php
/*
Widget Name: About Us Partnering With Us
Description: Partnering With Us for about us page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_About_US_Partnering_With_Us_Widget' ) ):

class Edupress_Ecommerce_About_US_Partnering_With_Us_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-aboutus-partnering-with-us',

        esc_html__('About Us Page Partnering With Us', 'edupress'),


        array(
            'description' => esc_html__('About Us page Partnering With Us.', 'edupress'),
			'panels_groups' => array('edupressaboutus'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html__('Partnering With Us', 'edupress'),
            ),
			'partners' => array(
				'type' => 'repeater',
				'label' => esc_html__( 'Partners' , 'edupress' ),
				'item_name'  => esc_html__( 'partner', 'edupress' ),
				'item_label' => array(
					'selector'     => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title', 'edupress' )
					),
					 'desc' => array(
						'type' => 'textarea',
						'label' => esc_html__( 'Description', 'edupress' )
					),
					
				)
			),
		
			
        ),
        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'partners' => $instance['partners'],
		);
	}
	
  
}

siteorigin_widget_register('edupress-ecommerce-aboutus-partnering-with-us', __FILE__, 'Edupress_Ecommerce_About_US_Partnering_With_Us_Widget');
endif;
?>