<?php
/*
Widget Name: Home One Teachers
Description: Teachers for home page one'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_One_Teachers_Widget' ) ):

class Edupress_Kid_Home_One_Teachers_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'edupress-kid-home-one-teachers',

        esc_html__('Home One Teachers', 'edupress'),

        array(
            'description' => esc_html__('Teachers for home page one', 'edupress'),
			'panels_groups' => array('edupresskidhome1'),
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
            'title_prefix' => array(
                'type' => 'text',
                'label' => esc_html__('Title Prefix', 'edupress'),
                'default' => 'Our'
            ),
			'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Teachers'),
            ),
			'desc' => array(
					'type' => 'tinymce',
					'label' => esc_html__( 'Description', 'edupress' ),
					'default' =>  '<ul>
									<li>Lorem ipsum is simply dummy text of the printing and typestting industry</li>
								</ul>',
					
				),
				
			'teachers_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Teachers', 'edupress' ),
				'default' => '6',
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
			 'btn_text' => array(
                'type' => 'text',
                'label' => esc_html__('Techer Full Detail Button Text', 'edupress'),
                'default' => esc_html('Know More'),
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
			'title_prefix' => $instance['title_prefix'],
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			'teachers_no' => $instance['teachers_no'],
			'teachers_orderby' => $instance['teachers_orderby'],
			'btn_text' => $instance['btn_text'] ? $instance['btn_text']: esc_html('Know More'),
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-one-teachers', __FILE__, 'Edupress_Kid_Home_One_Teachers_Widget');
endif;
?>