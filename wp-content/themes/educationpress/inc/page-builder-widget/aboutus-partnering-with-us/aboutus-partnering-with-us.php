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
if( !class_exists( 'About_US_Partnering_With_Us_Widget' ) ):

class About_US_Partnering_With_Us_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'aboutus-partnering-with-us',

        esc_html__('About Us Page Partnering With Us', 'educationpress'),


        array(
            'description' => esc_html__('About Us page Partnering With Us.', 'educationpress'),
			'panels_groups' => array('aboutus'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'educationpress'),
                'default' => esc_html__('Partnering With Us', 'educationpress'),
            ),
			'partners' => array(
				'type' => 'repeater',
				'label' => esc_html__( 'Partners' , 'educationpress' ),
				'item_name'  => esc_html__( 'partner', 'educationpress' ),
				'item_label' => array(
					'selector'     => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title', 'educationpress' )
					),
					 'desc' => array(
						'type' => 'textarea',
						'label' => esc_html__( 'Description', 'educationpress' )
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

siteorigin_widget_register('aboutus-partnering-with-us', __FILE__, 'About_US_Partnering_With_Us_Widget');
endif;
?>