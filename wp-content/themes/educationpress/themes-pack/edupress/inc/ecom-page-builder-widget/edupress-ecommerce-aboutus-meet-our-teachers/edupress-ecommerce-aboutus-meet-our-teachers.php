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
if( !class_exists( 'Edupress_Ecommerce_About_US_Meet_Our_Teachers_Widget' ) ):

class Edupress_Ecommerce_About_US_Meet_Our_Teachers_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-aboutus-meet-our-teachers',

        esc_html__('About Us Page Meet Our Teachers', 'edupress'),


        array(
            'description' => esc_html__('About Us page Meet Our Teachers.', 'edupress'),
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
                'default' => esc_html__('Meet Our Teachers', 'edupress'),
            ),
			'orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'registered',
				'options'  => array(
					'display_name' => esc_html__('Order by user display name', 'edupress'),
					'registered' => esc_html__('Order by user registered date', 'edupress'),				
					),
    		),
			'order' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order', 'edupress' ),
				'default' => 'DESC',
				'options'  => array(
					'ASC' => esc_html__('Ascending', 'edupress'),
                	'DESC' => esc_html__('Descending', 'edupress'),
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

siteorigin_widget_register('edupress-ecommerce-aboutus-meet-our-teachers', __FILE__, 'Edupress_Ecommerce_About_US_Meet_Our_Teachers_Widget');
endif;
?>