<?php
/*
Widget Name: Home One Slider
Description: Slider for Home Page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_One_Slider_Widget' ) ):

class Home_One_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-one-slider',

        esc_html__('Home One Slider', 'educationpress'),


        array(
            'description' => esc_html__('Home page one slider.', 'educationpress'),
			'panels_groups' => array('educationpresshome1'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

	array(
	'text_in_slide' => array(
			'type' => 'select',
			'label' => __( 'Would you like to add tag, title, description and button in slide?', 'educationpress' ),
			'options' => array(
								'yes' => esc_html__('Yes', 'educationpress'),
								'no' => esc_html__('No', 'educationpress'),
			
						),
			'default' => true,
			'state_emitter' => array(
							'callback' => 'select',
							'args' => array( 'text_in_slide' )
						),
			
			
		 ),
    'slider_one' => array(
        'type' => 'repeater',
        'label' => esc_html__( 'Slider frames' , 'educationpress' ),
        'item_name'  => esc_html__( 'Frame', 'educationpress' ),
        'item_label' => array(
            'selector'     => "[id*='slider_tag']",
            'update_event' => 'change',
            'value_method' => 'val'
        ),
        'fields' => array(
			'slider_image' => array(
				'type' => 'media',
				'library' => 'image',
				'label' => esc_html__('Slider image', 'educationpress'),
				'fallback' => true,				
			),			
            'slider_tag' => array(
                'type' => 'text',
                'label' => esc_html__( 'Tagline', 'educationpress' ),
				'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
				
            ),
            'slider_title' => array(
                'type' => 'text',
                'label' => esc_html__( 'Title', 'educationpress' ),
				'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
            ),
			 'slider_desc' => array(
                'type' => 'textarea',
                'label' => esc_html__( 'Description', 'educationpress' ),
				'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
            ),
			'slider_buttontext' => array(
                'type' => 'text',
                'label' => esc_html__( 'Button Text', 'educationpress' ),
				'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
            ),
			'slider_buttonurl' => array(
                'type' => 'link',
                'label' => esc_html__( 'Destination URL', 'educationpress' ),
				'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
            ),
			'slider_newwindow' => array(
				'type' => 'checkbox',
				'label' => esc_html__('Open in new window', 'educationpress'),
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
				'label' => esc_html__( 'Slide Order', 'educationpress' ),
				'default' => 'normal',
				'options'  => array(
					'normal' => esc_html__('Normal', 'educationpress'),
					'random' => esc_html__('Random', 'educationpress'),				
					),
	),
	'slider_animation' => array(
				'type' => 'select',
				'label' => esc_html__( 'Slider Animation', 'educationpress' ),
				'default' => 'fade',
				'options'  => array(
					'fade' => esc_html__('Fade', 'educationpress'),
					'slide' => esc_html__('Slide', 'educationpress'),				
					),
	),
	'slider_direction' => array(
				'type' => 'select',
				'label' => esc_html__( 'Slider Direction', 'educationpress' ),
				'default' => 'horizontal',
				'options'  => array(
					'horizontal' => esc_html__('Horizontal', 'educationpress'),
					'vertical' => esc_html__('Vertical', 'educationpress'),				
					),
	),
	'slider_slide_show' => array(
				'type' => 'select',
				'label' => esc_html__( 'Slider AutoPlay', 'educationpress' ),
				'default' => '1',
				'options'  => array(
					'1' => esc_html__('Yes', 'educationpress'),
					'0' => esc_html__('No', 'educationpress'),				
					),
	),
	'slider_show_speed' => array(
				'type' => 'number',
				'label' => esc_html__( 'Slide Show Speed (In Milliseconds)', 'educationpress' ),
				'default' => 7000,
				
	),
	'slider_animation_speed' => array(
				'type' => 'number',
				'label' => esc_html__( 'Animation Speed (In Milliseconds)', 'educationpress' ),
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
				'label' => esc_html__('Slider Background Color', 'educationpress'),
				'default' => '#ffffff',
				'description' => esc_html__('Slider Background Color is applied if slider image is transperant', 'educationpress'),
				'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
	),
	'tag_color' => array(
        'type' => 'color',
        'label' => __( 'Tagline Color', 'educationpress' ),
        'default' => '#ffffff',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	'tag_bgcolor' => array(
        'type' => 'color',
        'label' => __( 'Tagline Background Color', 'educationpress' ),
        'default' => '#0583e4',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	'title_color' => array(
        'type' => 'color',
        'label' => __( 'Title Text Color', 'educationpress' ),
        'default' => '#ffffff',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	'desc_color' => array(
        'type' => 'color',
        'label' => __( 'Description Text Color', 'educationpress' ),
        'default' => '#ffffff',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	
	'button_color' => array(
        'type' => 'color',
        'label' => __( 'Button Normal Text Color', 'educationpress' ),
        'default' => '#ffffff',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	'button_bgcolor' => array(
        'type' => 'color',
        'label' => __( 'Button Normal Background Color', 'educationpress' ),
		'default' => '',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	'button_hover_color' => array(
        'type' => 'color',
        'label' => __( 'Button Hover Text Color', 'educationpress' ),
        'default' => '#ffffff',
		'state_handler' => array(
							'text_in_slide[yes]' => array('show'),
							 '_else[text_in_slide]' =>  array('hide'),
					),
    ),
	'button_hover_bgcolor' => array(
        'type' => 'color',
        'label' => __( 'Button Hover Background Color', 'educationpress' ),
        'default' => '#0583e4',
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
			'tag_color' => !empty($instance['tag_color']) ? $instance['tag_color'] : '#ffffff',        
			'tag_bgcolor' => !empty($instance['tag_bgcolor']) ? $instance['tag_bgcolor'] : '#0583e4',        
			'title_color' => !empty($instance['title_color']) ? $instance['title_color'] : '#ffffff',
			'desc_color' => !empty($instance['desc_color']) ? $instance['desc_color'] : '#ffffff',
			'button_color' => !empty($instance['button_color']) ? $instance['button_color'] : '#ffffff',
			'button_bgcolor' => !empty($instance['button_bgcolor']) ? $instance['button_bgcolor'] : '',
			'button_hover_color' => !empty($instance['button_hover_color']) ? $instance['button_hover_color'] : '#ffffff',
			'button_hover_bgcolor' => !empty($instance['button_hover_bgcolor']) ? $instance['button_hover_bgcolor'] : '#0583e4',

			
		);
	}
	
	
  
}

siteorigin_widget_register('home-one-slider', __FILE__, 'Home_One_Slider_Widget');
endif;
?>