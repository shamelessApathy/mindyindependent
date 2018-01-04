<?php
/*
Widget Name: Home Two Latest News 
Description: Latest News for home page two.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_University_Home_Two_Latest_News' ) ):
class Edupress_University_Home_Two_Latest_News extends SiteOrigin_Widget {
	function __construct() {
		
	
    parent::__construct(
        'edupress-university-home-two-latest-news',

        esc_html__('Home Two Latest News ', 'edupress'),

        array(
            'description' => esc_html__('Latest News for home page two', 'edupress'),
			'panels_groups' =>  array('edupressuniversityhome2'),
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
			
		return array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Event Title', 'edupress'),
                'default' => esc_html('Latest News'),
            ),
			'post_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a post category', 'edupress' ),
				'options' =>  $all_cat,
    		),
			'post_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of News', 'edupress' ),
				'default' => '3',
				'options' => edupress_get_num_array(),
    		),
        );	
			
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'post_cat' => $instance['post_cat'],						
			'post_no' => $instance['post_no'],
		);
	}	

  
}

siteorigin_widget_register('edupress-university-home-two-latest-news', __FILE__, 'Edupress_University_Home_Two_Latest_News');
endif;
?>