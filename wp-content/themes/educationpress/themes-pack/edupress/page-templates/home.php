<?php
/**
 * Template Name: Home 
 *
 * @package EduPress\page-templates
 * @author  ThemeCycle
 * @since   EduPress 1.0.0
 */
global $edupress_options,$post;

if( edupress_is_a( 'ecom' ) ) {
	
	
	
	if($edupress_options['edupress_header_variation']=='1')
	{
		if($post->post_name=='home-page-2' && !is_front_page())
		get_header('ecom-home-two');
		elseif($post->post_name=='home-page-3' && !is_front_page())
		get_header('ecom-home-three');
		else
		get_header('ecom-home-one');
	
	}elseif($edupress_options['edupress_header_variation']=='2')
	{
		
		if($post->post_name=='home-page-1' &&  !is_front_page()) 
		get_header('ecom-home-one');
		elseif($post->post_name=='home-page-3' &&  !is_front_page())
		get_header('ecom-home-three');
		else
		get_header('ecom-home-two');
	
	
	}elseif($edupress_options['edupress_header_variation']=='3')
	{	
		if($post->post_name=='home-page-2' && !is_front_page())
			get_header('ecom-home-two');
		elseif($post->post_name=='home-page-1' && !is_front_page())
			get_header('ecom-home-one');
		else
		{
			get_header('ecom-home-three');
		}
	}
}
elseif( edupress_is_a( 'uni' ) ) {
	if($edupress_options['edupress_header_variation']=='1')
	{
		if($post->post_name=='home-page-2' && !is_front_page())
			get_header('uni-home-two');
		else
			get_header('uni-home-one');
	
	}elseif($edupress_options['edupress_header_variation']=='2')
	{
		
		if($post->post_name=='home-page-1' &&  !is_front_page()) 
			get_header('uni-home-one');
		else
			get_header('uni-home-two');
	
	}	
}
elseif( edupress_is_a( 'kid' ) ) {
	if($edupress_options['edupress_header_variation']=='1')
	{
		if($post->post_name=='home-page-2' && !is_front_page())
			get_header('kid-home-two');
		else
			get_header('kid-home-one');
	
	}elseif($edupress_options['edupress_header_variation']=='2')
	{
		
		if($post->post_name=='home-page-1' &&  !is_front_page()) 
			get_header('kid-home-one');
		else
			get_header('kid-home-two');
	
	}	
}




while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edupress' ),
				'after'  => '</div>',
			) );
endwhile; // End of the loop. 

get_footer();
?>
