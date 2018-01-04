<?php
/*
Widget Name: Home One Banner With Button
Description: Banner With Button for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_One_Banner_With_Button_Widget' ) ):
class Edupress_University_Home_One_Banner_With_Button_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-university-home-one-banner-with-button',

        esc_html__('Home One Banner With Button', 'edupress'),


        array(
            'description' => esc_html__('Home One Banner Banner With Button', 'edupress'),
			'panels_groups' => array('edupressuniversityhome1'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Banner Title', 'edupress'),
                'default' => 'Good Day ! here will be big title long that you find this is really long'
            ),
			'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),		
					'default' => 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. It has survived not only five centuries,remaining essentially unchanged.',			
				),
				/*
				 * For button 1 
				 */
				'button1_text' => array(
					'type' => 'text',
					'label' => esc_html__( 'Button1 Text', 'edupress' ),
					'default' =>  esc_html('View Campus'),
				),
				'button1_url' => array(
					'type' => 'link',
					'label' => esc_html__( 'Button1 Destination URL', 'edupress' )
				),
				'button1_newwindow' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Button1 Open in new window', 'edupress'),
					'default' => false,
				),
				'button1_color' => array(
					'type' => 'color',
					'label' => __( 'Button1 Text Color', 'edupress' ),
					'default' => '#ffffff'
				),
				'button1_bgcolor' => array(
					'type' => 'color',
					'label' => __( 'Button1 Normal Background Color', 'edupress' ),
					'default' => '#4caf50'
				),
				'button1_hover_color' => array(
					'type' => 'color',
					'label' => __( 'Button1 Hover Text Color', 'edupress' ),
					'default' => '#ffffff'
				),
				'button1_hover_bgcolor' => array(
					'type' => 'color',
					'label' => __( 'Button1 Hover Background Color', 'edupress' ),
					'default' => '#03a9f4'
				),	
				
				/*
				 * For button 2 
				 */
				'button2_text' => array(
					'type' => 'text',
					'label' => esc_html__( 'Button2 Text', 'edupress' ),
					'default' =>  esc_html('Join Today'),
				),
				'button2_url' => array(
					'type' => 'link',
					'label' => esc_html__( 'Button2 Destination URL', 'edupress' )
				),
				'button2_newwindow' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Button2 Open in new window', 'edupress'),
					'default' => false,
				),
				'button2_color' => array(
					'type' => 'color',
					'label' => __( 'Button2 Text Color', 'edupress' ),
					'default' => '#929ba6'
				),
				'button2_bgcolor' => array(
					'type' => 'color',
					'label' => __( 'Button2 Normal Background Color', 'edupress' ),
					'default' => '#ffffff'
				),
				'button2_hover_color' => array(
					'type' => 'color',
					'label' => __( 'Button2 Hover Text Color', 'edupress' ),
					'default' => '#ffffff'
				),
				'button2_hover_bgcolor' => array(
					'type' => 'color',
					'label' => __( 'Button2 Hover Background Color', 'edupress' ),
					'default' => '#4caf50'
				),	
			
        ),
       


        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			/*
			 * For button 1 
			 */
			'button1_text' => $instance['button1_text'],
			'button1_url' => $instance['button1_url'],
			'button1_newwindow' => $instance['button1_newwindow'],
			'button1_color' => $instance['button1_color'],
			'button1_bgcolor' => $instance['button1_bgcolor'],
			'button1_hover_color' => $instance['button1_hover_color'],
			'button1_hover_bgcolor' => $instance['button1_hover_bgcolor'],	
			
			/*
			 * For button 2 
			 */
			'button2_text' => $instance['button2_text'],
			'button2_url' => $instance['button2_url'],
			'button2_newwindow' => $instance['button2_newwindow'],
			'button2_color' => $instance['button2_color'],
			'button2_bgcolor' => $instance['button2_bgcolor'],
			'button2_hover_color' => $instance['button2_hover_color'],
			'button2_hover_bgcolor' => $instance['button2_hover_bgcolor'],
				
		);
	}
	
	

	
	

  
}

siteorigin_widget_register('edupress-university-home-one-banner-with-button', __FILE__, 'Edupress_University_Home_One_Banner_With_Button_Widget');
endif;
?>