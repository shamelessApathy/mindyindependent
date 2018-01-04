<?php
/*
Widget Name: Home One Classes
Description: Classes for home page one'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_One_Classes_Widget' ) ):

class Edupress_Kid_Home_One_Classes_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'edupress-kid-home-one-classes',

        esc_html__('Home One Classes', 'edupress'),

        array(
            'description' => esc_html__('Classes for home page one', 'edupress'),
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
		$class_cat=get_terms( 'class-category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($class_cat) )
			$all_cat=$temp_arr + $class_cat;
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
                'default' => 'Classes'
            ),
			'desc' => array(
					'type' => 'tinymce',
					'label' => esc_html__( 'Description', 'edupress' ),
					'default' =>  '<ul>
									<li>Lorem ipsum is simply dummy text of the printing and typestting industry</li>
								</ul>',
					
				),
				
			'class_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Classes', 'edupress' ),
				'default' => '6',
				'options' => array(
					'3' => esc_html__( '3', 'edupress' ),
					'6' => esc_html__( '6', 'edupress' ),
					'9' => esc_html__( '9', 'edupress' ),
					'12' => esc_html__( '12', 'edupress' ),
				)
    		),
			'class_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a class category', 'edupress' ),
				'options' =>  $all_cat,
    		),
			'class_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'date',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'rand' => esc_html__('Random Order', 'edupress'),
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
			'title_prefix' => $instance['title_prefix'],
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			'class_no' => $instance['class_no'],
			'class_cat' => $instance['class_cat'],
			'class_orderby' => $instance['class_orderby'],
			
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-one-classes', __FILE__, 'Edupress_Kid_Home_One_Classes_Widget');
endif;
?>