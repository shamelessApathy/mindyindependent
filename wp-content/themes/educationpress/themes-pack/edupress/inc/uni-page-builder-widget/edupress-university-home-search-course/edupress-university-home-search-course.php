<?php
/*
Widget Name: Home Search Course
Description: What People Say for home page.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_Search_Course_Widget' ) ):
class Edupress_University_Home_Search_Course_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-university-home-search-course',

        esc_html__('Home Search Course', 'edupress'),

        array(
            'description' => esc_html__('Search Course for home page', 'edupress'),
			'panels_groups' => array('edupressuniversityhome1','edupressuniversityhome2'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Search Course Title', 'edupress'),
                'default' => esc_html('Search Our New Courses'),
            ),
			'desc' => array(
                'type' => 'textarea',
                'label' => esc_html__('Search Course Description', 'edupress'),
                'default' => esc_html('Our courses are applied, innovative and grounded in the real world.'),
				'rows' => 2,
				
            ),
			'placeholder' => array(
				'type' => 'text',
				'label' => esc_html__('Search Box Place Holder', 'edupress'),
				'default' => 'search by keyword',
    		),
			'cat_selection' => array(
				'type' => 'select',
				'label' => esc_html__('Is Course Category Selection?', 'edupress'),
				'options' => array(
								'yes' => esc_html__('Yes', 'edupress'),
								'no' => esc_html__('No', 'edupress'),
							),
				'default' => 'yes',
    		),
			'button_text' => array(
				'type' => 'text',
				'label' => esc_html__('Search Button Text', 'edupress'),
				'default' => 'Search',
    		),

        ),

        plugin_dir_path(__FILE__)
    );
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			'placeholder' => $instance['placeholder'],
			'cat_selection' => $instance['cat_selection'],
			'button_text' => $instance['button_text'],
		);
	}
	

  
}

siteorigin_widget_register('edupress-university-home-search-course', __FILE__, 'Edupress_University_Home_Search_Course_Widget');
endif;
?>