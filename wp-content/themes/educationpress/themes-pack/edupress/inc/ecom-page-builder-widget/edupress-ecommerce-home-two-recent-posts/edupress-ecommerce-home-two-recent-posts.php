<?php
/*
Widget Name: Home Two Recent Post
Description: Recent post for home page two'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php

if( !class_exists( 'Edupress_Ecommerce_Home_Two_Recent_Post_Widget' ) ):
class Edupress_Ecommerce_Home_Two_Recent_Post_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-home-two-recent-posts',

        esc_html__('Home Two Recent post', 'edupress'),

        array(
            'description' => esc_html__('Recent post for home page two', 'edupress'),
			'panels_groups' =>  array('edupressecommercehome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Recent Post Title', 'edupress'),
                'default' => 'Recent Post'
            ),
        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
		);
	}	

  
}

siteorigin_widget_register('edupress-ecommerce-home-two-recent-posts', __FILE__, 'Edupress_Ecommerce_Home_Two_Recent_Post_Widget');

endif;
?>