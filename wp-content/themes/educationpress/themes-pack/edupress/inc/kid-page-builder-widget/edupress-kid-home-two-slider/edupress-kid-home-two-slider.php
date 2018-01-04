<?php
/*
Widget Name: Home Two Slider
Description: Slider for Home Page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Slider_Widget' ) ):
class Edupress_Kid_Home_Two_Slider_Widget extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-kid-home-two-slider',

        esc_html__('Home Two Slider', 'edupress'),


        array(
            'description' => esc_html__('Home page Two slider.', 'edupress'),
			'panels_groups' => array('edupresskidhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

		array(
		'text_in_slide' => array(
			'type' => 'select',
			'label' => __( 'Would you like to add tag, title, description and button in slide?', 'edupress' ),
			'options' => array(
								'yes' => esc_html__('Yes', 'edupress'),
								'no' => esc_html__('No', 'edupress'),
			
						),
			'default' => true,
			'state_emitter' => array(
							'callback' => 'select',
							'args' => array( 'text_in_slide' )
						),
		 ),
		'slider_one' => array(
			'type' => 'repeater',
			'label' => esc_html__( 'Slider frames' , 'edupress' ),
			'item_name'  => esc_html__( 'Frame', 'edupress' ),
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
				),							
				'slider_title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Title', 'edupress' ),
					'default' => esc_html('Welcome !'),
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),
				'slider_tag' => array(
					'type' => 'text',
					'label' => esc_html__( 'Tag Line', 'edupress' ),
					'default' => esc_html('A Place that Enagages'),
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),
				'slider_tag_postfix' => array(
					'type' => 'text',
					'label' => esc_html__( 'TagLine Postfix', 'edupress' ),
					'default' => esc_html('Each Child'),
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),				
				'slider_desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),
				'slider_buttontext' => array(
					'type' => 'text',
					'label' => esc_html__( 'Button Text', 'edupress' ),
					'default' => esc_html('Go to Classes'),
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),
				'slider_buttonurl' => array(
					'type' => 'link',
					'label' => esc_html__( 'Destination URL', 'edupress' ),
					'default' => '#',
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),
				'slider_newwindow' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Open in new window', 'edupress'),
					'default' => false,
					'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				),
			)
		),
		/*
		 * start for slider js config 
		*/
		'slider_order' => array(
					'type' => 'select',
					'label' => esc_html__( 'Slide Order', 'edupress' ),
					'default' => 'normal',
					'options'  => array(
						'normal' => esc_html__('Normal', 'edupress'),
						'random' => esc_html__('Random', 'edupress'),				
						),
		),
		'slider_animation' => array(
					'type' => 'select',
					'label' => esc_html__( 'Slider Animation', 'edupress' ),
					'default' => 'fade',
					'options'  => array(
						'fade' => esc_html__('Fade', 'edupress'),
						'slide' => esc_html__('Slide', 'edupress'),				
						),
		),
		'slider_direction' => array(
					'type' => 'select',
					'label' => esc_html__( 'Slider Direction', 'edupress' ),
					'default' => 'horizontal',
					'options'  => array(
						'horizontal' => esc_html__('Horizontal', 'edupress'),
						'vertical' => esc_html__('Vertical', 'edupress'),				
						),
		),
		'slider_slide_show' => array(
					'type' => 'select',
					'label' => esc_html__( 'Slider AutoPlay', 'edupress' ),
					'default' => '1',
					'options'  => array(
						'1' => esc_html__('Yes', 'edupress'),
						'0' => esc_html__('No', 'edupress'),				
						),
		),
		'slider_show_speed' => array(
					'type' => 'number',
					'label' => esc_html__( 'Slide Show Speed (In Milliseconds)', 'edupress' ),
					'default' => 7000,
					
		),
		'slider_animation_speed' => array(
					'type' => 'number',
					'label' => esc_html__( 'Animation Speed (In Milliseconds)', 'edupress' ),
					'default' => 600,
					
		),
		/*
		 * end for slider js config 
		*/
		
		/*
		 * start for slider color config 
		*/
		'slider_bg_color' => array(
					'type' => 'color',
					'label' => esc_html__('Slider Background Color', 'edupress'),
					'default' => '#ffffff',
					'description' => esc_html__('Slider Background Color is applied if slider image is transperant', 'edupress'),
					
		),
		
		'title_color' => array(
			'type' => 'color',
			'label' => __( 'Title Text Color', 'edupress' ),
			'default' => '#ffffff',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),

		'tag_color' => array(
			'type' => 'color',
			'label' => __( 'Tagline Color', 'edupress' ),
			'default' => '#4ad130',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),


		'tag_postfix_color' => array(
			'type' => 'color',
			'label' => __( 'Tagline Postfix Color', 'edupress' ),
			'default' => '#333',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),



		'desc_color' => array(
			'type' => 'color',
			'label' => __( 'Description Text Color', 'edupress' ),
			'default' => '#ffffff',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),
		
		'button_color' => array(
			'type' => 'color',
			'label' => __( 'Button Normal Text Color', 'edupress' ),
			'default' => '#ffffff',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),	
		),
		'button_border_color' => array(
			'type' => 'color',
			'label' => __( 'Button Normal Border Color', 'edupress' ),
			'default' => '#4ad130'	,
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),	
		),
		'button_bgcolor' => array(
			'type' => 'color',
			'label' => __( 'Button Normal Background Color', 'edupress' ),
			'default' => '',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),
		'button_hover_color' => array(
			'type' => 'color',
			'label' => __( 'Button Hover Text Color', 'edupress' ),
			'default' => '#ffffff',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),
		'button_hover_border_color' => array(
			'type' => 'color',
			'label' => __( 'Button Hover Border Color', 'edupress' ),
			'default' => '#4ad130',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),	
		),
		'button_hover_bgcolor' => array(
			'type' => 'color',
			'label' => __( 'Button Hover Background Color', 'edupress' ),
			'default' => '',
			'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
		),	
		/*
		 * end for slider color config 
		*/
	
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
			'text_in_slide' => !empty($instance['text_in_slide']) ? $instance['text_in_slide'] : 'yes',
			'slider_one' => !empty($instance['slider_one']) ? $instance['slider_one'] : array(),
			/*
			 * start for slider js config 
			*/
			'slider_order' => !empty($instance['slider_order']) ? $instance['slider_order'] : 'normal',
			'slider_animation' => !empty($instance['slider_animation']) ? $instance['slider_animation'] : 'fade',
			'slider_direction' => !empty($instance['slider_direction']) ? $instance['slider_direction'] : 'horizontal',
			'slider_slide_show' => !empty($instance['slider_slide_show']) ? $instance['slider_slide_show'] : '0',
			'slider_show_speed' => !empty($instance['slider_show_speed']) ? $instance['slider_show_speed'] : '7000',
			'slider_animation_speed' => !empty($instance['slider_animation_speed']) ? $instance['slider_animation_speed'] : '600',
			/*
			 * end for slider js config 
			*/
			
			/*
			 * start for slider color config 
			*/
			'slider_bg_color' => !empty($instance['slider_bg_color']) ? $instance['slider_bg_color'] : '#ffffff',        
			'tag_color' => !empty($instance['tag_color']) ? $instance['tag_color'] : '#4ad130',  
			'tag_postfix_color' => !empty($instance['tag_postfix_color']) ? $instance['tag_postfix_color'] : '#333',  
	
			'title_color' => !empty($instance['title_color']) ? $instance['title_color'] : '#ffffff',
			'desc_color' => !empty($instance['desc_color']) ? $instance['desc_color'] : '#ffffff',
			'button_color' => !empty($instance['button_color']) ? $instance['button_color'] : '#ffffff',
			'button_border_color' => !empty($instance['button_border_color']) ? $instance['button_border_color'] : '',
			'button_bgcolor' => !empty($instance['button_bgcolor']) ? $instance['button_bgcolor'] : '',
			'button_hover_color' => !empty($instance['button_hover_color']) ? $instance['button_hover_color'] : '#ffffff',
			'button_hover_border_color' => !empty($instance['button_hover_border_color']) ? $instance['button_hover_border_color'] : '',
			'button_hover_bgcolor' => !empty($instance['button_hover_bgcolor']) ? $instance['button_hover_bgcolor'] : '',

			
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-two-slider', __FILE__, 'Edupress_Kid_Home_Two_Slider_Widget');
endif;
?>