<?php
/*
Widget Name: Home Two Menu
Description: Menu for home page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_Two_Menu_Widget' ) ):
class Edupress_University_Home_Two_Menu_Widget extends SiteOrigin_Widget {
	function __construct() {
		$nav_menu_arr = array('0' => esc_html__('Select Menu', 'edupress'));
		// Get menus
		$menus = wp_get_nav_menus();
		foreach ( $menus as $menu ) {
			$nav_menu_arr[ $menu->term_id ] = $menu->name;
		}
		
		$field_array = array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Administration'),
            ),
			'nav_menu' => array(
				'type' => 'select',
				'label' => esc_html__( 'Menu', 'edupress' ),
				'options' => $nav_menu_arr,
    		),
		
        );
		
	    parent::__construct(
        'edupress-university-home-two-menu',

        esc_html__('Home Two Menu', 'edupress'),

        array(
            'description' => esc_html__('Administration Menu for home page two', 'edupress'),
			'panels_groups' => array('edupressuniversityhome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        $field_array,

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'nav_menu' => $instance['nav_menu'],
		);
	}

  
}

siteorigin_widget_register('edupress-university-home-two-menu', __FILE__, 'Edupress_University_Home_Two_Menu_Widget');
endif;
?>