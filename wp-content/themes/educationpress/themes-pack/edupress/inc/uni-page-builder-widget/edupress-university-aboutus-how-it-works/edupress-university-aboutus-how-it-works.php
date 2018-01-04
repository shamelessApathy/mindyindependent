<?php
/*
Widget Name: About Us How It Works
Description: How it works for about us page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_About_US_How_It_Works_Widget' ) ):
class Edupress_University_About_US_How_It_Works_Widget extends SiteOrigin_Widget {
	function __construct() {
	global $signup_url;
    parent::__construct(
        'edupress-university-aboutus-how-it-works',

        esc_html__('About Us Page How It Works', 'edupress'),


        array(
            'description' => esc_html__('About Us page How It Works.', 'edupress'),
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
                'default' => esc_html__('How It Works?', 'edupress'),
            ),
			'desc' => array(
				'type' => 'textarea',
				'label' => esc_html__('Description', 'edupress'),
				'default' => 'Quisque varius vitae dolor eget pellentesque Integer ultricies velitleo vestibulum feugiat mauris sollicitudin porttitor finibus liqultrices metus.',
        
			),
			'features' => array(
				'type' => 'repeater',
				'label' => esc_html__( 'Features' , 'edupress' ),
				'item_name'  => esc_html__( 'feature', 'edupress' ),
				'item_label' => array(
					'selector'     => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'icon' => array(
						'type' => 'icon',
						'label' => esc_html__('Icon', 'edupress'),
					),
					'title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title', 'edupress' )
					),
					 'desc' => array(
						'type' => 'textarea',
						'label' => esc_html__( 'Description', 'edupress' )
					),
					'bgcolor' => array(
						'type' => 'color',
						'label' => esc_html__( 'Background Color', 'edupress' )
					),
					
				)
			),
			'text' => array(
                'type' => 'text',
                'label' => esc_html__('Text Before Button', 'edupress'),
                'default' => esc_html__('Want to Start Learning Online Today?', 'edupress'),
            ),
			'buttontext' => array(
						'type' => 'text',
						'label' => esc_html__( 'Button Text', 'edupress' ),
						'default' => esc_html__('Sign Up Today', 'edupress'),
			),
			'buttonurl' => array(
						'type' => 'link',
						'label' => esc_html__( 'Button URL', 'edupress' ),
						'default' => $signup_url,
			),
			
        ),
       


        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			'features' => $instance['features'],
			'text' => $instance['text'],
			'buttonurl' => $instance['buttonurl'],
			'buttontext' => $instance['buttontext'],
		);
	}
  
}

siteorigin_widget_register('edupress-university-aboutus-how-it-works', __FILE__, 'Edupress_University_About_US_How_It_Works_Widget');
endif;
?>