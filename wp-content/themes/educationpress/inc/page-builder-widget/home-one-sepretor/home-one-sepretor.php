<?php
/*
Widget Name: Home Separator 
Description: Sepretor for home page one use between search form and serch by category widget'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_One_Sepretor_Widget' ) ):
class Home_One_Sepretor_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-one-sepretor',

        esc_html__('Home Separator', 'educationpress'),

        array(
            'description' => esc_html__('Separator for home page to use between search form and serch by category widget', 'educationpress'),
			'panels_groups' => array('educationpresshome1'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'text' => array(
                'type' => 'text',
                'label' => esc_html__('Sepretor Text', 'educationpress'),
                'default' => 'OR'
            ),
        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'text' => $instance['text'],
		);
	}
	

  
}

siteorigin_widget_register('home-one-sepretor', __FILE__, 'Home_One_Sepretor_Widget');
endif;
?>