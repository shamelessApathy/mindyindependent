<?php
/*
Widget Name: Home One Features
Description: Features for Home Page 1.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_One_Features_Widget' ) ):
class Edupress_Kid_Home_One_Features_Widget extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-kid-home-one-features',

        esc_html__('Home One Features', 'edupress'),


        array(
            'description' => esc_html__('Home page one features.', 'edupress'),
			'panels_groups' => array('edupresskidhome1'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

		array(
		'title_prefix' => array(
					'type' => 'text',
					'label' => esc_html__( 'Title Prefix', 'edupress' ),
					'default' =>  esc_html('Our'),
				),
		'title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Title', 'edupress' ),
					'default' =>  esc_html('Features'),
				),
		'desc' => array(
					'type' => 'tinymce',
					'label' => esc_html__( 'Description', 'edupress' ),
					'default' =>  '<ul>
									<li>Lorem ipsum is simply dummy text of the printing and typestting industry</li>
								</ul>',
					
				),
				
		'features' => array(
			'type' => 'repeater',
			'label' => esc_html__( 'Features' , 'edupress' ),
			'item_name'  => esc_html__( 'Feature', 'edupress' ),
			'item_label' => array(
				'selector'     => "[id*='title']",
				'update_event' => 'change',
				'value_method' => 'val'
			),
			'fields' => array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Feature Title', 'edupress' ),
					'default' =>  '',
				),
				'icon' => array(
					'type' => 'icon',
					'label' => esc_html__( 'Feature Icon', 'edupress' ),
					'default' => 'linearicons-lnr-graduation-hat',
				),
				'desc' => array(
					'type' => 'tinymce',
					'label' => esc_html__('Feature Description', 'edupress'),
				),
			),
			
		),
		
		'btn_text' => array(
					'type' => 'text',
					'label' => esc_html__( 'Button Text', 'edupress' ),
					'default' => esc_html('Know More'),
				),
		'btn_url' => array(
					'type' => 'link',
					'label' => esc_html__( 'Button URL', 'edupress' ),
					'default' => '',
					'description' => esc_html__( 'If you would not like to show button, please leave Button Url as empty', 'edupress' )
					
				),
		'btn_newwindow' => array(
			'type' => 'checkbox',
			'label' => esc_html__('Open in new window', 'edupress'),
			'default' => false,
		),
		
	),
			
			plugin_dir_path(__FILE__)
		);
		}
		
		

	
	
	
	function get_template_variables( $instance, $args ){
		
		return array(
			'title_prefix' => !empty($instance['title_prefix']) ? $instance['title_prefix'] : '',
			'title'	=> !empty($instance['title']) ? $instance['title'] : '',
			'desc'	=> !empty($instance['desc']) ? $instance['desc'] : '',
			'features' => !empty($instance['features']) ? $instance['features'] : array(),
			'btn_text' => !empty($instance['btn_text']) ? $instance['btn_text'] : 'Know More',
			'btn_url' => !empty($instance['btn_url']) ? $instance['btn_url'] : '',
			'btn_newwindow'  => !empty($instance['btn_newwindow']) ? $instance['btn_newwindow'] : false,
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-one-features', __FILE__, 'Edupress_Kid_Home_One_Features_Widget');
endif;
?>