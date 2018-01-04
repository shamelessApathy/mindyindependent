<?php
/*
Widget Name: Home One Blog
Description: Blog for home page one'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_One_Blog_Widget' ) ):

class Edupress_Kid_Home_One_Blog_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'edupress-kid-home-one-blog',

        esc_html__('Home One Blog', 'edupress'),

        array(
            'description' => esc_html__('Blog for home page one', 'edupress'),
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
		$blog_cat=get_terms( 'category', 'orderby=name&fields=id=>name&hide_empty=0' );
		if( is_array($blog_cat) )
			$all_cat=$temp_arr + $blog_cat;
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
                'default' => 'Blog'
            ),
			'desc' => array(
					'type' => 'tinymce',
					'label' => esc_html__( 'Description', 'edupress' ),
					'default' =>  '<ul>
									<li>Lorem ipsum is simply dummy text of the printing and typestting industry</li>
								</ul>',
					
			),	
			'blog_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Blog', 'edupress' ),
				'default' => '2',
				'options' => array(
					'2' => esc_html__( '2', 'edupress' ),
					'4' => esc_html__( '4', 'edupress' ),
					'6' => esc_html__( '6', 'edupress' ),
					'8' => esc_html__( '8', 'edupress' ),
					'10' => esc_html__( '10', 'edupress' ),
					'12' => esc_html__( '12', 'edupress' ),
					'14' => esc_html__( '14', 'edupress' ),
				)
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
                'label' => esc_html__('Full View Button Text', 'edupress'),
                'default' => 'Know More'
            ),
        );
	
		return $field_array;
		
	}
	
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title_prefix' => $instance['title_prefix'],
			'title' => $instance['title'],
			'desc' => $instance['desc'],
			'blog_no' => $instance['blog_no'],
			'blog_cat' => $instance['blog_cat'],
			'blog_orderby' => $instance['blog_orderby'],
			'btn_text' => !empty( $instance['btn_text'] )? $instance['btn_text'] : 'Know More',
			
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-one-blog', __FILE__, 'Edupress_Kid_Home_One_Blog_Widget');
endif;
?>