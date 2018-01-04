<?php
/*
Widget Name: Home One Sepretor 
Description: Sepretor for home page one use between search form and serch by category widget'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_Home_One_Sepretor_Widget' ) ):

class Edupress_Ecommerce_Home_One_Sepretor_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-home-one-sepretor',

        esc_html__('Home One Sepretor', 'edupress'),

        array(
            'description' => esc_html__('Sepretor for home page one use between search form and serch by category widget', 'edupress'),
			'panels_groups' => array('edupressecommercehome1'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'text' => array(
                'type' => 'text',
                'label' => esc_html__('Sepretor Text', 'edupress'),
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

siteorigin_widget_register('edupress-ecommerce-home-one-sepretor', __FILE__, 'Edupress_Ecommerce_Home_One_Sepretor_Widget');
endif;
?>