<?php
/*
Widget Name: Home One Search By Category
Description: Search by category for home page one.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Home_One_Search_By_Category_Widget' ) ):

class Home_One_Search_By_Category_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'home-one-search-by-category',

        esc_html__('Home One Search By Category', 'educationpress'),


        array(
            'description' => esc_html__('Home page one search by category.', 'educationpress'),
			'panels_groups' => array('educationpresshome1'),
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
		return array(
            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Title', 'educationpress'),
                'default' => esc_html__('Search By Category', 'educationpress'),
            ),
			'course_cat' => array(
				'type' => 'select',
				'label' => esc_html__('Choose a course categories. You can add short description, background color and icon for course categories from CoursePress Pro -> Course Categories', 'educationpress'),
				'multiple' => true,
				'options' =>  get_terms( 'course_category', 'orderby=name&fields=id=>name&hide_empty=0' ),
    		),
			
        );
	}
	
	
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'course_cat' => $instance['course_cat']
		);
	}
	/*
	function modify_form( $form ){
		$form['course_cat']['options'] = get_terms( 'course_category', 'orderby=name&fields=id=>name&hide_empty=0' );
		return $form;
	}*/
	function get_term_icon_and_bg($term_id)
	{
		$background_style = array();
		$cp_cat_bg= get_term_meta($term_id,'tc_cp_cat_bg');
		$cp_cat_icon= get_term_meta($term_id,'tc_cp_cat_icon');
		$cp_cat_ic_url='';
		$cat_color_cp=true;
		if(is_array($cp_cat_icon))
		{
			if(array_key_exists("url",$cp_cat_icon[0]))
			{
				$cp_cat_ic_url=$cp_cat_icon[0]["url"];
				$background_style[] = 'background-image: url(' . esc_url($cp_cat_ic_url) . ')';
				
			}
		}
		if(! empty($cp_cat_bg) && $cp_cat_bg!='#')
		{
			$background_style[] = 'background-color:'.$cp_cat_bg[0].';';
		}
		return $background_style;
		
	}
	
  
}

siteorigin_widget_register('home-one-search-by-category', __FILE__, 'Home_One_Search_By_Category_Widget');
endif;
?>