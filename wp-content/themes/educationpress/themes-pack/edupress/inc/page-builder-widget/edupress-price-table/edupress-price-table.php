<?php
/*
Widget Name: EduPress Price Table
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

        esc_html__('EduPress Price Table', 'edupress'),


        array(
            'description' => esc_html__('Edupress price table.', 'edupress'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
			'columns' => array(
				'type' => 'repeater',
				'label' => esc_html__( 'Columns' , 'edupress' ),
				'item_name'  => esc_html__( 'column', 'edupress' ),
				'item_label' => array(
					'selector'     => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title', 'edupress'),
					),
					'cur' => array(
						'type' => 'text',
						'label' => esc_html__('Currency', 'edupress'),
					),
					'price' => array(
						'type' => 'text',
						'label' => esc_html__('Price', 'edupress'),
					),
					'per' => array(
						'type' => 'text',
						'label' => esc_html__('Per', 'edupress'),
					),
					'subtitle' => array(
						'type' => 'text',
						'label' => esc_html__('Subtitle', 'edupress'),
					),
					'button' => array(
						'type' => 'text',
						'label' => esc_html__('Button text', 'edupress'),
					),
					'url' => array(
						'type' => 'link',
						'label' => esc_html__('Button URL', 'edupress'),
					),
					'bg_color' => array(
						'type' => 'color',
						'label' => esc_html__('Background color', 'edupress'),
					),
					'features' => array(
							'type' => 'repeater',
							'label' => esc_html__('Features', 'edupress'),
							'item_name' => esc_html__('Feature', 'edupress'),
							'item_label' => array(
								'selector' => "[id*='columns-features-text']",
								'update_event' => 'change',
								'value_method' => 'val'
							),
							'fields' => array(
								'text' => array(
									'type' => 'text',
									'label' => esc_html__('Text', 'edupress'),
								),
								'icon_new' => array(
									'type' => 'icon',
									'label' => esc_html__('Icon', 'edupress'),
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