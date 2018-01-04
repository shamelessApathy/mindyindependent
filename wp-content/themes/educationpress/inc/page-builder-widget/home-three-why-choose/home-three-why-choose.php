<?php
/*
Widget Name: Home Three Why Should You Choose
Description: Why should you choose with icon for home page three.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_Three_Why_Should_You_Choose' ) ):

class Home_Three_Why_Should_You_Choose extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-three-why-choose',

        esc_html__('Home Three Why Should You Choose', 'educationpress'),


        array(
            'description' => esc_html__('Home page three why should you choose.', 'educationpress'),
			'panels_groups' => array('educationpresshome3'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'educationpress'),
                'default' => esc_html__('Why should you choose EducationPress', 'educationpress'),
            ),
			'bgimage' => array(
				'type' => 'media',
				'library' => 'image',
				'label' => esc_html__('Background Image 1970x1323 px', 'educationpress'),
				'fallback' => true,
			),
			'services' => array(
				'type' => 'repeater',
				'label' => esc_html__( 'Services' , 'educationpress' ),
				'item_name'  => esc_html__( 'Service', 'educationpress' ),
				'item_label' => array(
					'selector'     => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'icon' => array(
						'type' => 'icon',
						'label' => esc_html__('Icon', 'educationpress'),
					),
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
			'bgimage' => $instance['bgimage'],
			'services' => $instance['services']
		);
	}
	
	

	
	

  
}

siteorigin_widget_register('home-three-why-choose', __FILE__, 'Home_Three_Why_Should_You_Choose');
endif;
?>