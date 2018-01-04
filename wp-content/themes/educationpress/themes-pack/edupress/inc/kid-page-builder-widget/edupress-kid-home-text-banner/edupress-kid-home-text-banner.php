<?php
/*
Widget Name: Home Text Banner 
Description: Text Banner for home page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Text_Banner_Widget' ) ):

class Edupress_Kid_Home_Text_Banner_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-kid-home-text-banner',

        esc_html__('Home Text Banner', 'edupress'),


        array(
            'description' => esc_html__('Home Text Banner', 'edupress'),
			'panels_groups' => array('edupresskidhome1', 'edupresskidhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		false,

        plugin_dir_path(__FILE__)
    );
	}
	
	function get_widget_form() {
		return array(
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'edupress'),
				'default' => esc_html('Remaining essentially unchanged.'),
			),
			'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),		
					'default' => esc_html('When an unknown printer took a galley of type and scrambled it to make a type specimen book.'),			
				),
            'bgimage' => array(
				'type' => 'media',
				'library' => 'image',
				'label' => esc_html__('Background Image 1970x658 px', 'edupress'),
				'fallback' => true,
				'desc' => esc_html__( 'BackGround image size should have width of 1970px and height of 348px', 'edupress' ),
			),
			
			
			'btn_text' => array(
						'type' => 'text',
						'label' => esc_html__( 'Button Text', 'edupress' ),
						'default' => esc_html('Know More'),
					),
			'btn_url' => array(
						'type' => 'link',
						'label' => esc_html__( 'Button Link', 'edupress' ),
						'default' => '',
						'description' => esc_html__( 'If you would not like to show button, please leave Button Url as empty', 'edupress' )
						
					),
			'btn_newwindow' => array(
				'type' => 'checkbox',
				'label' => esc_html__('Open in new window', 'edupress'),
				'default' => false,
			),
			
			
			
        );	
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],		
			'desc' => $instance['desc'],
			'bgimage' =>$instance['bgimage'],
			'btn_text' => !empty($instance['btn_text']) ? $instance['btn_text'] : 'Know More',
			'btn_url' => !empty($instance['btn_url']) ? $instance['btn_url'] : '',
			'btn_newwindow'  => !empty($instance['btn_newwindow']) ? $instance['btn_newwindow'] : false,
					
		);
	}
	
	

	
	

  
}

siteorigin_widget_register('edupress-kid-home-text-banner', __FILE__, 'Edupress_Kid_Home_Text_Banner_Widget');
endif;
?>