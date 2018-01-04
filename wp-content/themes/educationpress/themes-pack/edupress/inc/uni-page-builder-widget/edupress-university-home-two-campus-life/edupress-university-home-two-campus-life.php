<?php
/*
Widget Name: Home Two Campus Life
Description: Campus Life for home page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Two_Home_Campus_Life' ) ):
class Edupress_University_Two_Home_Campus_Life extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-university-home-two-campus-life',

        esc_html__('Home Two Campus Life', 'edupress'),

        array(
            'description' => esc_html__('Campus Life for home page two', 'edupress'),
			'panels_groups' => array('edupressuniversityhome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),
        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Our Campus Life')
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
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'campus_no' => $instance['campus_no'],
			'campus_orderby' => $instance['campus_orderby'],
			
		);
	}

  
}

siteorigin_widget_register('edupress-university-home-two-campus-life', __FILE__, 'Edupress_University_Two_Home_Campus_Life');
endif;
?>