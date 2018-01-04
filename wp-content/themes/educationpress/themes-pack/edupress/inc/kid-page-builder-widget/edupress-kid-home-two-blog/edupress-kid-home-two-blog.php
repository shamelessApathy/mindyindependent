<?php
/*
Widget Name: Home Two Blog
Description: Blog for home page two'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_Two_Blog_Widget' ) ):

class Edupress_Kid_Home_Two_Blog_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'edupress-kid-home-two-blog',

        esc_html__('Home Two Blog', 'edupress'),

        array(
            'description' => esc_html__('Blog for home page two', 'edupress'),
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
		$blog_cat=get_terms( 'category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($blog_cat) )
			$all_cat=$temp_arr + $blog_cat;
		else
			$all_cat=$temp_arr;
		
		
		$field_array = array(
            
			'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html('Blog'),
            ),
			'blog_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Blog', 'edupress' ),
				'default' => '3',
				'options' => edupress_get_num_array(),
    		),
			'blog_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a Blog category', 'edupress' ),
				'options' =>  $all_cat,
    		),
			'blog_orderby' => array(
				'type' => 'select',
				'label' => esc_html__( 'Order By', 'edupress' ),
				'default' => 'date',
				'options'  => array(
					'date' => esc_html__('Most Recent', 'edupress'),
					'rand' => esc_html__('Random Order', 'edupress'),
					'title' => esc_html__('Order By Title', 'edupress'),
				),
    		),
			'btn_text' => array(
                'type' => 'text',
                'label' => esc_html__('All Blog Button Text', 'edupress'),
                'default' => esc_html('View All'),
				'description' => 'If you make this text empty, button will not be displayed.',
            ),
        );
	
		return $field_array;
		
	}
	
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'blog_no' => $instance['blog_no'],
			'blog_cat' => $instance['blog_cat'],
			'blog_orderby' => $instance['blog_orderby'],
			'btn_text' => !empty( $instance['btn_text'] )? $instance['btn_text'] : '',
			
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-two-blog', __FILE__, 'Edupress_Kid_Home_Two_Blog_Widget');
endif;

?>