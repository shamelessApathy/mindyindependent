<?php
/*
Widget Name: EducationPress Price Table
Description: Simple Price Table
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Price_Table_Widget' ) ):

class Edupress_Price_Table_Widget extends SiteOrigin_Widget {
	function __construct() {
	global $signup_url;
    parent::__construct(
        'edupress-price-table',

        esc_html__('EducationPress Price Table', 'educationpress'),


        array(
            'description' => esc_html__('Educationpress price table.', 'educationpress'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
			'columns' => array(
				'type' => 'repeater',
				'label' => esc_html__( 'Columns' , 'educationpress' ),
				'item_name'  => esc_html__( 'column', 'educationpress' ),
				'item_label' => array(
					'selector'     => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title', 'educationpress'),
					),
					'cur' => array(
						'type' => 'text',
						'label' => esc_html__('Currency', 'educationpress'),
					),
					'price' => array(
						'type' => 'text',
						'label' => esc_html__('Price', 'educationpress'),
					),
					'per' => array(
						'type' => 'text',
						'label' => esc_html__('Per', 'educationpress'),
					),
					'subtitle' => array(
						'type' => 'text',
						'label' => esc_html__('Subtitle', 'educationpress'),
					),
					'button' => array(
						'type' => 'text',
						'label' => esc_html__('Button text', 'educationpress'),
					),
					'url' => array(
						'type' => 'link',
						'label' => esc_html__('Button URL', 'educationpress'),
					),
					         
					'features' => array(
							'type' => 'repeater',
							'label' => esc_html__('Features', 'educationpress'),
							'item_name' => esc_html__('Feature', 'educationpress'),
							'item_label' => array(
								'selector' => "[id*='columns-features-text']",
								'update_event' => 'change',
								'value_method' => 'val'
							),
							'fields' => array(
								'text' => array(
									'type' => 'text',
									'label' => esc_html__('Text', 'educationpress'),
								),
								'icon_new' => array(
									'type' => 'icon',
									'label' => esc_html__('Icon', 'educationpress'),
								),
							),
					),
					
				)
			),
			
			
        ),
       


        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'columns' => $instance['columns'],
		);
	}
}

siteorigin_widget_register('edupress-price-table', __FILE__, 'Edupress_Price_Table_Widget');
endif;
?>