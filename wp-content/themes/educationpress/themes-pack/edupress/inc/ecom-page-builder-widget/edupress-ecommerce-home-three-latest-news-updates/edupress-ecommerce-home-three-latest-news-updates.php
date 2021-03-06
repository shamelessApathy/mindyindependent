<?php
/*
Widget Name: Home Three Latest News & Updates 
Description: Latest News & Updates for home page three'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_Home_Three_Latest_News_Updates_Widget' ) ):

class Edupress_Ecommerce_Home_Three_Latest_News_Updates_Widget extends SiteOrigin_Widget {
	function __construct() {
	
	
	
    parent::__construct(
        'edupress-ecommerce-home-three-latest-news-updates',

        esc_html__('Home Three Latest News & Updates', 'edupress'),

        array(
            'description' => esc_html__('Latest News & Updates for home page three', 'edupress'),
			'panels_groups' => array('edupressecommercehome3'),
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
		 
		$temp_carr = array('0' => esc_html__('Select Category', 'edupress'));
		$temp_tarr = array('0' => esc_html__('Select Tag', 'edupress'));
		$post_cat_arr = get_terms( 'category', 'orderby=name&fields=id=>name&hide_empty=0' );
		$post_tag_arr =  get_terms( 'post_tag', 'orderby=name&fields=id=>name&hide_empty=0' );
		$all_pcat = $temp_carr + $post_cat_arr ;
		$all_ptag = $temp_tarr + $post_tag_arr;
		
		return  array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('News Title', 'edupress'),
                'default' => 'Latest News & Updates'
            ),
			'news_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of News', 'edupress' ),
				'default' => '5',
				'options' => array(
					'2' => esc_html__( '2', 'edupress' ),
					'3' => esc_html__( '3', 'edupress' ),
					'5' => esc_html__( '5', 'edupress' ),
					'10' => esc_html__( '10', 'edupress' ),
				)
    		),
			'news_types' => array(
				'type' => 'select',
				'label' => esc_html__( 'Types Of News Posts', 'edupress' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( 'Recent', 'edupress' ),
					'2' => esc_html__( 'Based On Category', 'edupress' ),
					'3' => esc_html__( 'Based On Tag', 'edupress' ),
				),
				'state_emitter' => array(
				'callback' => 'select',
				'args' => array( 'news_types' )
				),
    		),
			'news_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a news category', 'edupress' ),
				'options' =>  $all_pcat,
				'state_handler' => array(
				'news_types[1]' => array('hide'),
				'news_types[2]' => array('show'),
				'news_types[3]' => array('hide'),
				),
    		),
			'news_tag' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a news tag', 'edupress' ),
				'options' =>  $all_ptag,
				'state_handler' => array(
				'news_types[1]' => array('hide'),
				'news_types[2]' => array('hide'),
				'news_types[3]' => array('show'),
				),
    		),


        );
	
	}
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'news_no' => $instance['news_no'],
			'news_types' => $instance['news_types'],
			'news_cat' => $instance['news_cat'],
			'news_tag' => $instance['news_tag'],
		);
	}

  
}

siteorigin_widget_register('edupress-ecommerce-home-three-latest-news-updates', __FILE__, 'Edupress_Ecommerce_Home_Three_Latest_News_Updates_Widget');
endif;
?>