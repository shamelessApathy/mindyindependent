<?php
/*
Widget Name: Home One Announcements
Description: Campus Announcements for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_One_Announcements_Widget' ) ):
class Edupress_University_Home_One_Announcements_Widget extends SiteOrigin_Widget {
	function __construct() {
		
		
	    parent::__construct(
        'edupress-university-home-one-announcements',

        esc_html__('Home One Announcements', 'edupress'),

        array(
            'description' => esc_html__('Announcements for home page one', 'edupress'),
			'panels_groups' => array('edupressuniversityhome1'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        false,

        plugin_dir_path(__FILE__)
    );
	}
	
	function get_widget_form() {
		$temp_arr = array('0' => esc_html__('Select Category', 'edupress'));
		$course_cat=get_terms( 'category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array( $temp_arr ) && is_array($course_cat) )
			$all_cat = $temp_arr + $course_cat;
		
		$field_array = array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Announcements'),
            ),
			'post_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Posts', 'edupress' ),
				'default' => esc_html('3'),
				'options' => edupress_get_num_array(),
    		),
			'post_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a post category', 'edupress' ),
				'options' =>  $all_cat,
    		),
		
        );
		return $field_array;
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'post_no' => $instance['post_no'],
			'post_cat' => $instance['post_cat'],
		);
	}

  
}

siteorigin_widget_register('edupress-university-home-one-announcements', __FILE__, 'Edupress_University_Home_One_Announcements_Widget');
endif;
?>