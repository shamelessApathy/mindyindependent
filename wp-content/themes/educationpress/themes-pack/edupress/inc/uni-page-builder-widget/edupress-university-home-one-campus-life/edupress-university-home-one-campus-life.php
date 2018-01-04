<?php
/*
Widget Name: Home One Campus Life
Description: Campus Life for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_One_Campus_Life' ) ):
class Edupress_University_Home_One_Campus_Life extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-university-home-one-campus-life',

        esc_html__('Home One Campus Life', 'edupress'),

        array(
            'description' => esc_html__('Campus Life for home page two', 'edupress'),
			'panels_groups' => array('edupressuniversityhome1'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),
        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => 'Our Campus Life'
            ),
			'campus_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Campuses', 'edupress' ),
				'default' => '3',
				'options' => array(
					'3' => esc_html__( '3', 'edupress' ),
					'6' => esc_html__( '6', 'edupress' ),
					'9' => esc_html__( '9', 'edupress' ),
					'12' => esc_html__( '12', 'edupress' ),
				)
    		),
			'campus_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'ratings',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'rand' => esc_html__('Random Order', 'edupress'),
					'title' => esc_html__('Order By Title', 'edupress'),
				),
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
			'campus_no' => $instance['campus_no'],
			'campus_orderby' => $instance['campus_orderby'],
			
		);
	}

  
}

siteorigin_widget_register('edupress-university-home-one-campus-life', __FILE__, 'Edupress_University_Home_One_Campus_Life');
endif;

?>