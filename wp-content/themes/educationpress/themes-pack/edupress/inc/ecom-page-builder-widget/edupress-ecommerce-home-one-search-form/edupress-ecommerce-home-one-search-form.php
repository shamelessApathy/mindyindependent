<?php
/*
Widget Name: Home One Search Form 
Description: Search form for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_Home_One_Search_Form_Widget' ) ):

class Edupress_Ecommerce_Home_One_Search_Form_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-home-one-search-form',

        esc_html__('Home One Search Form', 'edupress'),


        array(
            'description' => esc_html__('Home page one search form with icons.', 'edupress'),
			'panels_groups' => array('edupressecommercehome1'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),
		
		array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html__('Emerge yourself by learning new Skills', 'edupress'),
            ),
			'form' => array(
                'type' => 'radio',
                'label' => esc_html__('Enable Search Form', 'edupress'),
                'options' => array(
					'1' => esc_html__('Yes', 'edupress'),
					'2' => esc_html__('No', 'edupress'),
				),
				'default' => '1',
				'state_emitter' => array(
				'callback' => 'select',
				'args' => array( 'form' )
				),
            ),
			'auto_on' => array(
                'type' => 'radio',
                'label' => esc_html__('Enable Search Auto Complete/Suggest', 'edupress'),
                'options' => array(
					'1' => esc_html__('Yes', 'edupress'),
					'2' => esc_html__('No', 'edupress'),
				),
				'default' => '1',
				'state_handler' => array(
				'form[1]' => array('show'),
				'form[2]' => array('hide'),
				),           
			 ),
			'icon_on' => array(
                'type' => 'radio',
                'label' => esc_html__('Enable Icon Under Form', 'edupress'),
                'options' => array(
					'1' => esc_html__('Yes', 'edupress'),
					'2' => esc_html__('No', 'edupress'),
				),
				'default' => '1',
				'state_emitter' => array(
				'callback' => 'select',
				'args' => array( 'icon_on' )
				),
            ),
			'icon1' => array(
				'type' => 'icon',
				'label' => esc_html__('1st Icon', 'edupress'),
				'default' => 'linearicons-lnr-graduation-hat',
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icontext1' => array(
				'type' => 'text',
				'label' => esc_html__('1st Icon Text', 'edupress'),
				'default' => esc_html__('Over 5 Million Students Enrolled', 'edupress'),
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icon2' => array(
				'type' => 'icon',
				'label' => esc_html__('2nd Icon', 'edupress'),
				'default' => 'linearicons-lnr-book',
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icontext2' => array(
				'type' => 'text',
				'label' => esc_html__('2nd Icon Text', 'edupress'),
				'default' => esc_html__('More than 25,000 Online Available Courses', 'edupress'),
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icon3' => array(
				'type' => 'icon',
				'label' => esc_html__('3rd Icon', 'edupress'),
				'default' => 'linearicons-lnr-laptop-phone',
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icontext3' => array(
				'type' => 'text',
				'label' => esc_html__('3rd Icon Text', 'edupress'),
				'default' => esc_html__('Learn skills on any Devices anytime', 'edupress'),
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icon4' => array(
				'type' => 'icon',
				'label' => esc_html__('4th Icon', 'edupress'),
				'default' => 'linearicons-lnr-users',
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
			'icontext4' => array(
				'type' => 'text',
				'label' => esc_html__('4th Icon Text', 'edupress'),
				'default' => esc_html__('More than 5,000 Instructors Registered', 'edupress'),
				'state_handler' => array(
				'icon_on[1]' => array('show'),
				'icon_on[2]' => array('hide'),
				),
			),
        ),
       


        
        plugin_dir_path(__FILE__)
    );
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'form' => $instance['form'],
			'auto_on' => $instance['auto_on'],
			'icon_on' => $instance['icon_on'],
			'icon1' => $instance['icon1'],
			'icontext1' => $instance['icontext1'],
			'icon2' => $instance['icon2'],
			'icontext2' => $instance['icontext2'],
			'icon3' => $instance['icon3'],
			'icontext3' => $instance['icontext3'],
			'icon4' => $instance['icon4'],
			'icontext4' => $instance['icontext4'],
		);
	}
	
	

	
	

  
}

siteorigin_widget_register('edupress-ecommerce-home-one-search-form', __FILE__, 'Edupress_Ecommerce_Home_One_Search_Form_Widget');
endif;
?>