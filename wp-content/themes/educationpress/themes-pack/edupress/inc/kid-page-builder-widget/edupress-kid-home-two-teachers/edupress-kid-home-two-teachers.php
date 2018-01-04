<?php
/*
Widget Name: Home Two Teachers
Description: Teachers for home page two'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Teachers_Widget' ) ):

class Edupress_Kid_Home_Two_Teachers_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'edupress-kid-home-two-teachers',

        esc_html__('Home Two Teachers', 'edupress'),

        array(
            'description' => esc_html__('Teachers for home page two', 'edupress'),
			'panels_groups' => array('edupresskidhome2'),
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
		$teachers_cat=get_terms( 'class-category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($teachers_cat) )
			$all_cat=$temp_arr + $teachers_cat;
		else
			$all_cat=$temp_arr;
		
		
		$field_array = array(
           
			'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Teachers'),
            ),
			
			'teachers_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Teachers', 'edupress' ),
				'default' => '4',
				'options' => edupress_get_num_array(),
    		),
			'teachers_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'date',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'title' => esc_html__('Order By Title', 'edupress'),
				),
    		),
			
        );
	
		return $field_array;
		
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
			'teachers_no' => $instance['teachers_no'],
			'teachers_orderby' => $instance['teachers_orderby'],
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-two-teachers', __FILE__, 'Edupress_Kid_Home_Two_Teachers_Widget');
endif;
?>