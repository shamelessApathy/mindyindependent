<?php
/*
Widget Name: About Us Meet Our Teachers
Description: Meet Our Teachers for about us page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'About_US_Meet_Our_Teachers_Widget' ) ):

class About_US_Meet_Our_Teachers_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'aboutus-meet-our-teachers',

        esc_html__('About Us Page Meet Our Teachers', 'educationpress'),


        array(
            'description' => esc_html__('About Us page Meet Our Teachers.', 'educationpress'),
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
                'default' => esc_html__('Meet Our Teachers', 'educationpress'),
            ),
			'orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'educationpress' ),
				'default' => 'registered',
				'options'  => array(
					'display_name' => esc_html__('Order by user display name', 'educationpress'),
					'registered' => esc_html__('Order by user registered date', 'educationpress'),				
					),
    		),
			'order' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order', 'educationpress' ),
				'default' => 'DESC',
				'options'  => array(
					'ASC' => esc_html__('Ascending', 'educationpress'),
                	'DESC' => esc_html__('Descending', 'educationpress'),
					),
    		),
			
        ),
       


        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'orderby' => $instance['orderby'],
			'order' => $instance['order'],
		);
	}
	
	

	
	

  
}

siteorigin_widget_register('aboutus-meet-our-teachers', __FILE__, 'About_US_Meet_Our_Teachers_Widget');
endif;

?>