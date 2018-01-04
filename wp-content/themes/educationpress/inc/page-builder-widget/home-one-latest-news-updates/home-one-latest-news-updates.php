<?php
/*
Widget Name: Home One Latest News & Updates 
Description: Latest News & Updates for home page one'.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_One_Latest_News_Updates_Widget' ) ):

class Home_One_Latest_News_Updates_Widget extends SiteOrigin_Widget {
	function __construct() {
		
    parent::__construct(
        'home-one-latest-news-updates',

        esc_html__('Home One Latest News & Updates', 'educationpress'),

        array(
            'description' => esc_html__('Latest News & Updates for home page one', 'educationpress'),
			'panels_groups' => array('educationpresshome1'),
            'help'        => 'http://themecycle.com',
			'has_preview' => false,
        ),

        array(
        ),

        false,

        plugin_dir_path(__FILE__)
    );
	}
	function get_widget_form(){
		$temp_carr = array('0' => esc_html__('Select Category', 'educationpress'));
		$temp_tarr = array('0' => esc_html__('Select Tag', 'educationpress'));
		$post_cat_arr = get_terms( 'category', 'orderby=name&fields=id=>name&hide_empty=0' );
		$post_tag_arr =  get_terms( 'post_tag', 'orderby=name&fields=id=>name&hide_empty=0' );
		$all_pcat = $temp_carr + $post_cat_arr ;
		$all_ptag = $temp_tarr + $post_tag_arr;
		
		return array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('News Title', 'educationpress'),
                'default' => 'Latest News & Updates'
            ),
			'news_no' => array(
				'type' => 'select',
				'label' => esc_html__( 'Number of News', 'educationpress' ),
				'default' => '5',
				'options' => array(
					'2' => esc_html__( '2', 'educationpress' ),
					'3' => esc_html__( '3', 'educationpress' ),
					'5' => esc_html__( '5', 'educationpress' ),
					'10' => esc_html__( '10', 'educationpress' ),
				)
    		),
			'news_types' => array(
				'type' => 'select',
				'label' => esc_html__( 'Types Of News Posts', 'educationpress' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( 'Recent', 'educationpress' ),
					'2' => esc_html__( 'Based On Category', 'educationpress' ),
					'3' => esc_html__( 'Based On Tag', 'educationpress' ),
				),
				'state_emitter' => array(
				'callback' => 'select',
				'args' => array( 'news_types' )
				),
    		),
			'news_cat' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a news category', 'educationpress' ),
				'options' =>  $all_pcat,
				'state_handler' => array(
				'news_types[1]' => array('hide'),
				'news_types[2]' => array('show'),
				'news_types[3]' => array('hide'),
				),
    		),
			'news_tag' => array(
				'type' => 'select',
				'label' => esc_html__( 'Choose a news tag', 'educationpress' ),
				'options' =>  $all_ptag,
				'state_handler' => array(
				'news_types[1]' => array('hide'),
				'news_types[2]' => array('hide'),
				'news_types[3]' => array('show'),
				),
    		),


        );
	}
	/*
	function modify_form( $form ){
		$temp_carr = array('0' => esc_html__('Select Category', 'educationpress'));
		$temp_tarr = array('0' => esc_html__('Select Tag', 'educationpress'));
		$post_cat_arr = get_terms( 'category', 'orderby=name&fields=id=>name&hide_empty=0' );
		$post_tag_arr =  get_terms( 'post_tag', 'orderby=name&fields=id=>name&hide_empty=0' );
		$all_pcat = $temp_carr + $post_cat_arr ;
		$all_ptag = $temp_tarr + $post_tag_arr;
		$form['news_cat']['options'] = $all_pcat;
		$form['news_tag']['options'] = $all_ptag;
		return $form;
	}
	*/
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

siteorigin_widget_register('home-one-latest-news-updates', __FILE__, 'Home_One_Latest_News_Updates_Widget');
endif;
?>