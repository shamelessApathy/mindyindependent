<?php
/*
Widget Name: Home Three Browse By Category
Description: Browse by Category for home page three.
Author: ThemeCycle
Author URI: http://themecycle.com
Widget URI: http://themecycle.com
Video URI: http://themecycle.com
*/
?>
<?php
if( !class_exists( 'Edupress_Ecommerce_Home_Three_Browse_By_Category_Widget' ) ):

class Edupress_Ecommerce_Home_Three_Browse_By_Category_Widget extends SiteOrigin_Widget {
	function __construct() {

    parent::__construct(
        'edupress-ecommerce-home-three-browse-by-category',

        esc_html__('Home Three Browse By Category', 'edupress'),


        array(
            'description' => esc_html__('Home page three browse by category.', 'edupress'),
			'panels_groups' => array('edupressecommercehome3'),
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
                'default' => esc_html__('Browse by Category', 'edupress'),
            ),
			'course_cat' => array(
				'type' => 'select',
				'label' => esc_html__('Choose a course categories. You can select maximum six categories. You can add short description, background color and icon for course categories from Courses -> Categories', 'edupress'),
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
		
		return $background_style;
		
	}
	
	

	
	

  
}

siteorigin_widget_register('edupress-ecommerce-home-three-browse-by-category', __FILE__, 'Edupress_Ecommerce_Home_Three_Browse_By_Category_Widget');

endif;
?>