<?php
/*
Widget Name: Home Image Slider
Description: Image Slider for Home Page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Image_Slider_Widget' ) ):

class Edupress_Kid_Home_Image_Slider_Widget extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-kid-home-image-slider',

        esc_html__('Home Image Slider', 'edupress'),


        array(
            'description' => esc_html__('Home page Image slider.', 'edupress'),
			'panels_groups' => array('edupresskidhome1', 'edupresskidhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

		array(
		'image_slider' => array(
			'type' => 'repeater',
			'label' => esc_html__( 'Slider images' , 'edupress' ),
			'item_name'  => esc_html__( 'Image', 'edupress' ),
			'item_label' => array(
				'selector'     => "[id*='slider_title']",
				'update_event' => 'change',
				'value_method' => 'val'
			),
			'fields' => array(
				'slider_image' => array(
					'type' => 'media',
					'library' => 'image',
					'label' => esc_html__('Slider image', 'edupress'),
					'fallback' => true,
					'description' => 'Image size should have width of 296px and height of 305px for round image slider style<br/>
								Image size should have width of 457px and height of 257px for slider with bottom image preview style'
				),							
				'slider_title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Title', 'edupress' ),
					'default' =>  '',
					'description' => 'This will be used in alt and title attributes of image.' 
				),
				'slider_url' => array(
					'type' => 'link',
					'label' => esc_html__( 'Destination URL', 'edupress' ),
					'default' => '',
					'description' => esc_html__( 'When click on image this url will be opened. If you would not like to make image link, please make it empty.', 'edupress' )
					
				),
				'slider__newwindow' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Open in new window', 'edupress'),
					'default' => false,
				),
			),
			
		),
		
		'style' =>  array(
				'type' => 'radio',
				'label' => __( 'Choose a Image Slider Style', 'edupress' ),
				'default' => '1',
				'options' => array(
					'1' => __( 'Round Image Slider', 'edupress' ),
					'2' => __( 'Slider With Bottom Image Preview', 'edupress' ),
				
				)
			),
		
	),
			
			plugin_dir_path(__FILE__)
		);
		}
		
		

	
	
	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'jquery-flexslider',
					get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js' ,
					array( 'jquery' ),
					SOW_BUNDLE_VERSION,
					true
				)
			)
		);
		$this->register_frontend_styles(
			array(
				array(
					'flexslider',
					get_template_directory_uri() . '/assets/css/flexslider.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}
	function get_template_variables( $instance, $args ){
		
		return array(
			'image_slider' => !empty($instance['image_slider']) ? $instance['image_slider'] : array(),
			'style'	=> !empty($instance['style']) ? $instance['style'] : '1',
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-image-slider', __FILE__, 'Edupress_Kid_Home_Image_Slider_Widget');
endif;
?>