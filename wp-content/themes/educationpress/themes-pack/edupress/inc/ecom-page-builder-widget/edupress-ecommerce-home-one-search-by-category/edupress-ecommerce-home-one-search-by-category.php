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
if( !class_exists( 'Edupress_Ecommerce_Home_One_Search_By_Category_Widget' ) ):
class Edupress_Ecommerce_Home_One_Search_By_Category_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-home-one-search-by-category',

        esc_html__('Home One Search By Category', 'edupress'),


        array(
            'description' => esc_html__('Home page one search by category.', 'edupress'),
			'panels_groups' => array('edupressecommercehome1'),
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
                'label' => esc_html__('Title', 'edupress'),
                'default' => esc_html__('Search By Category', 'edupress'),
            ),
			'course_cat' => array(
				'type' => 'select',
				'label' => esc_html__('Choose a course categories. You can add short description, background color and icon for course categories from CoursePress Pro -> Course Categories', 'edupress'),
				'multiple' => true,
				'options' =>  get_terms( 'product_cat', 'orderby=name&fields=id=>name&hide_empty=0' ),
    		),
			
        );
	}
	
	
	
	function get_template_variables( $instance, $args ){
		return array(
			'title' => $instance['title'],
			'course_cat' => $instance['course_cat']
		);
	}
	function get_term_icon_and_bg($term_id)
	{
		$background_style = array();
		$ec_cat_bg= get_term_meta($term_id,'ec_cat_bg');
		$ec_cat_icon= get_term_meta($term_id,'ec_cat_icon');
		$ec_cat_ic_url='';
		$cat_color_cp=true;
		if(is_array($ec_cat_icon))
		{
			if(array_key_exists("url",$ec_cat_icon[0]))
			{
				$ec_cat_ic_url=$ec_cat_icon[0]["url"];
				$background_style[] = 'background-image: url(' . esc_url($ec_cat_ic_url) . ')';
				
			}
		}
		if(! empty($ec_cat_bg) && $ec_cat_bg!='#')
		{
			$background_style[] = 'background-color:'.$ec_cat_bg[0].';';
		}
		return $background_style;
		
	}
}

siteorigin_widget_register('edupress-ecommerce-home-one-search-by-category', __FILE__, 'Edupress_Ecommerce_Home_One_Search_By_Category_Widget');
endif;
?>