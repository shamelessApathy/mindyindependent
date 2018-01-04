<?php
/*
Widget Name: Home Three Testimonials 
Description: Testimonials for home page three'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_Three_What_People_Say_Widget' ) ):

class Home_Three_What_People_Say_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-three-what-people-say',

        esc_html__('Home Three Testimonials', 'educationpress'),

        array(
            'description' => esc_html__('Testimonials for home page three', 'educationpress'),
			'panels_groups' => array('educationpresshome3'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Testimonials Title', 'educationpress'),
                'default' => 'Testimonials'
            ),
			'bgimage' => array(
				'type' => 'media',
				'library' => 'image',
				'label' => esc_html__('Background Image 1970x658 px', 'educationpress'),
				'fallback' => true,
			),
			'testi_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of testimonials to display', 'educationpress' ),
				'default' => '4',
				'options' => array(
					'4' => esc_html__( '4', 'educationpress' ),
					'6' => esc_html__( '6', 'educationpress' ),
					'8' => esc_html__( '8', 'educationpress' ),
					'10' => esc_html__( '10', 'educationpress' ),
				)
    		),
			'speed' => array(
				'type' => 'number',
				'label' => esc_html__( 'Animation Speed (In Milliseconds)', 'educationpress' ),
				'default' => 3000,
				
			),
			

        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'bgimage' => $instance['bgimage'],
			'testi_no' => $instance['testi_no'],
			'speed' => !empty($instance['speed']) ? $instance['speed'] : '3000',
		);
	}
  
}

siteorigin_widget_register('home-three-what-people-say', __FILE__, 'Home_Three_What_People_Say_Widget');
endif;
?>