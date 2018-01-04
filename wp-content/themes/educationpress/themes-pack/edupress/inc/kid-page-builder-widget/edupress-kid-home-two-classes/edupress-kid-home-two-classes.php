<?php
/*
Widget Name: Home Two Classes
Description: Classes for home page two'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Classes_Widget' ) ):

class Edupress_Kid_Home_Two_Classes_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'edupress-kid-home-two-classes',

        esc_html__('Home Two Classes', 'edupress'),

        array(
            'description' => esc_html__('Classes for home page two', 'edupress'),
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
		$class_cat=get_terms( 'class-category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($class_cat) )
			$all_cat=$temp_arr + $class_cat;
		else
			$all_cat=$temp_arr;
		
		
		$field_array = array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Our Classes'),
            ),
			'desc' => array(
					'type' => 'textarea',
					'label' => esc_html__( 'Description', 'edupress' ),
					'default' =>  esc_html('Our preschool program has four dedicated classes'),
					
				),
				
			'class_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Classes', 'edupress' ),
				'default' => esc_html('4'),
				'options' => array(
					'2' => esc_html__( '2', 'edupress' ),
					'4' => esc_html__( '4', 'edupress' ),
					'6' => esc_html__( '6', 'edupress' ),
					'8' => esc_html__( '8', 'edupress' ),
					'10' => esc_html__( '10', 'edupress' ),					
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
				'default' => 'ratings',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'rand' => esc_html__('Random Order', 'edupress'),
					'title' => esc_html__('Order By Title', 'edupress'),
				),
    		),
			
        );
	
		return $field_array;
		
	}

	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			'class_no' => $instance['class_no'],
			'class_cat' => $instance['class_cat'],
			'class_orderby' => $instance['class_orderby'],
			
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-two-classes', __FILE__, 'Edupress_Kid_Home_Two_Classes_Widget');
endif;
?>