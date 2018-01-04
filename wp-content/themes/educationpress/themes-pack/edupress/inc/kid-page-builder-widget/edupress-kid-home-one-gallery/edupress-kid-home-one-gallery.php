<?php
/*
Widget Name: Home One Gallery
Description: Gallery for Home Page 1.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Kid_Home_One_Gallery_Widget' ) ):
class Edupress_Kid_Home_One_Gallery_Widget extends SiteOrigin_Widget {

	function __construct() {

    parent::__construct(
        'edupress-kid-home-one-gallery',

        esc_html__('Home One Gallery', 'edupress'),


        array(
            'description' => esc_html__('Home page one gallery.', 'edupress'),
			'panels_groups' => array('edupresskidhome1'),
            'help'        => 'http://themecycle.com/',
			'has_preview' => false,
        ),

        array(
        ),

		false,
			
			plugin_dir_path(__FILE__)
		);
		}
		
		

	function get_widget_form() {
		
		$gallery_options = array();
		
		$gallery_options = get_terms( 'gallery-category', 'orderby=name&fields=id=>name&hide_empty=0' );
		
		return array(
			'title_prefix' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title Prefix', 'edupress' ),
						'default' =>  esc_html('Fun'),
					),
			'title' => array(
						'type' => 'text',
						'label' => esc_html__( 'Title', 'edupress' ),
						'default' => esc_html( 'Gallery'),
					),
			'desc' => array(
						'type' => 'tinymce',
						'label' => esc_html__( 'Description', 'edupress' ),
						'default' =>  '<ul>
										<li>Lorem ipsum is simply dummy text of the printing and typestting industry</li>
									</ul>',
						
					),
					
			'gallery_cat_ids' => array(
						'type' => 'select',
						'label' => esc_html__( 'Gallery', 'edupress' ),
						'options' => $gallery_options,
						'default' =>  '',
						'description' => 'Choose Gallery which you like to show',
						'multiple' => true,
						
					),
					
			'post_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of Galleries', 'edupress' ),
				'default' => '4',
				'options' => array(
					'2' => esc_html__( '2', 'edupress' ),
					'4' => esc_html__( '4', 'edupress' ),
					'6' => esc_html__( '6', 'edupress' ),
				)
    		),
			'btn_text' => array(
						'type' => 'text',
						'label' => esc_html__( 'Button Text', 'edupress' ),
						'default' => esc_html('View Gallery'),
						
					),
			'btn_url' => array(
						'type' => 'link',
						'label' => esc_html__( 'Button URL', 'edupress' ),
						'default' => '',
						'description' => esc_html__( 'If you would not like to show button, please leave Button Url as empty', 'edupress' )
						
					),
			'btn_newwindow' => array(
				'type' => 'checkbox',
				'label' => esc_html__('Open in new window', 'edupress'),
				'default' => false,
			),
			
		);		
	}
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title_prefix' => !empty($instance['title_prefix']) ? $instance['title_prefix'] : '',
			'title'	=> !empty($instance['title']) ? $instance['title'] : '',
			'desc'	=> !empty($instance['desc']) ? $instance['desc'] : '',
			'gallery_cat_ids' => !empty($instance['gallery_cat_ids']) ? $instance['gallery_cat_ids'] : array(),
			'post_no' => $instance['post_no'],
			'btn_text' => !empty($instance['btn_text']) ? $instance['btn_text'] : 'Know More',
			'btn_url' => !empty($instance['btn_url']) ? $instance['btn_url'] : '',
			'btn_newwindow'  => !empty($instance['btn_newwindow']) ? $instance['btn_newwindow'] : false,
		);
	}

  
}

siteorigin_widget_register('edupress-kid-home-one-gallery', __FILE__, 'Edupress_Kid_Home_One_Gallery_Widget');
endif;
?>