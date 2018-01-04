<?php
/*
Widget Name: Home Partners
Description: Partners for Home Page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_Partners' ) ):
class Edupress_University_Home_Partners extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-university-home-partners',

        esc_html__('Home Partners', 'edupress'),


        array(
            'description' => esc_html__('Home page Partners.', 'edupress'),
			'panels_groups' => array('edupressuniversityhome1','edupressuniversityhome2'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

       

		array(
		 'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html__('Partners & Donors', 'edupress'),
            ),
		'partners' => array(
			'type' => 'repeater',
			'label' => esc_html__( 'Partners' , 'edupress' ),
			'item_name'  => esc_html__( 'Partner', 'edupress' ),
			'item_label' => array(
				'selector'     => "[id*='partner_title']",
				'update_event' => 'change',
				'value_method' => 'val'
			),
			'fields' => array(
				'partner_title' => array(
					'type' => 'text',
					'label' => esc_html__( 'Title', 'edupress' )
				),
				'partner_image' => array(
					'type' => 'media',
					'library' => 'image',
					'label' => esc_html__('Partner image', 'edupress'),
					'desc' => 'Please choose image of size 180X65',
					'fallback' => true,					
				),
				'partner_link' => array(
						'type' => 'link',
						'label' => esc_html__('Partner link', 'edupress'),
				),
				'partner_newwindow' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Open in new window', 'edupress'),
					'default' => true,
				),
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
					'owl-carousel',
					get_template_directory_uri() . '/assets/js/owl.carousel.js' ,
					array( 'jquery' ),
					SOW_BUNDLE_VERSION,
					true
				)
			)
		);
		$this->register_frontend_styles(
			array(
				array(
					'owl-carousel',
					get_template_directory_uri() . '/assets/css/owl.carousel.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
		
	}
	function get_template_variables( $instance, $args ){
		
		return array(
			'title' => $instance['title'],
			'partners' => !empty($instance['partners']) ? $instance['partners'] : array(),
			
		);
	}

  
}

siteorigin_widget_register('edupress-university-home-partners', __FILE__, 'Edupress_University_Home_Partners');
endif;
?>