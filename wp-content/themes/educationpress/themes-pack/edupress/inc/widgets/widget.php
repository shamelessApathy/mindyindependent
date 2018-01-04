<?php 
include_once ( get_template_directory() . '/inc/widgets/recent-posts-widget.php' );
include_once ( get_template_directory() . '/inc/widgets/recent-event-widget.php' );

if( edupress_is_a( 'ecom' ) ) {
	include_once ( get_template_directory() . '/inc/ecom-widgets/similar-courses-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/recent-course-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/course-cat-filter-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/course-price-filter-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/course-search-widget.php' );
}
elseif( edupress_is_a( 'uni' ) ) {
	
	include_once ( get_template_directory() . '/inc/uni-widgets/our-instructors-widget.php' );
	include_once ( get_template_directory() . '/inc/uni-widgets/course-search-widget.php' );
		
	include_once ( get_template_directory() . '/inc/uni-widgets/footer-contact-widget.php' );
}
elseif( edupress_is_a( 'kid' ) ) {
	include_once ( get_template_directory() . '/inc/kid-widgets/class-search-widget.php' );
	include_once ( get_template_directory() . '/inc/kid-widgets/class-cat-list-widget.php' );
	
	include_once ( get_template_directory() . '/inc/kid-widgets/class-similar-classes-widget.php' );
	include_once ( get_template_directory() . '/inc/kid-widgets/class-recent-classes-widget.php' );
	
}



$demo_selected	= isset($_REQUEST['demo-select']) ? $_REQUEST['demo-select'] : false;
if( $demo_selected == 'ecom' ) {
	include_once ( get_template_directory() . '/inc/ecom-widgets/similar-courses-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/recent-course-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/course-cat-filter-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/course-price-filter-widget.php' );
	include_once ( get_template_directory() . '/inc/ecom-widgets/course-search-widget.php' );
}
elseif( $demo_selected ==  'uni' ) {
	
	include_once ( get_template_directory() . '/inc/uni-widgets/our-instructors-widget.php' );
	include_once ( get_template_directory() . '/inc/uni-widgets/course-search-widget.php' );
		
	include_once ( get_template_directory() . '/inc/uni-widgets/footer-contact-widget.php' );
}
elseif( $demo_selected == 'kid'  ) {
	include_once ( get_template_directory() . '/inc/kid-widgets/class-search-widget.php' );
	include_once ( get_template_directory() . '/inc/kid-widgets/class-cat-list-widget.php' );
	
	include_once ( get_template_directory() . '/inc/kid-widgets/class-similar-classes-widget.php' );
	include_once ( get_template_directory() . '/inc/kid-widgets/class-recent-classes-widget.php' );
	
}