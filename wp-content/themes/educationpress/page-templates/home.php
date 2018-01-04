<?php
/**
 * Template Name: Home 
 *
 * @package EducationPress\page-templates
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */
global $educationpress_options,$post;
if($educationpress_options['educationpress_header_variation']=='1')
{
	if($post->post_name=='home-page-2' && !is_front_page())
	get_header('home-two');
	elseif($post->post_name=='home-page-3' && !is_front_page())
	get_header('home-three');
	else
	get_header('home-one');

}elseif($educationpress_options['educationpress_header_variation']=='2')
{
	
	if($post->post_name=='home-page-1' &&  !is_front_page()) 
	get_header('home-one');
	elseif($post->post_name=='home-page-3' &&  !is_front_page())
	get_header('home-three');
	else
	get_header('home-two');


}elseif($educationpress_options['educationpress_header_variation']=='3')
{
	
	if($post->post_name=='home-page-2' && !is_front_page())
	get_header('home-two');
	elseif($post->post_name=='home-page-1' && !is_front_page())
	get_header('home-one');
	else
	get_header('home-three');
}

 ?>

<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'educationpress' ),
				'after'  => '</div>',
			) );
		?>
			<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
