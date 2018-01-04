<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package edupress
 */
global $edupress_options;

?>

<div class="courses-info">
  <p class="excerpt"><?php echo strip_tags( get_the_excerpt() ); ?></p>
</div>
<!--courses-info #end  --> 

<a class="post-thumb" href="<?php the_permalink(); ?>">
<figure>
  <?php the_post_thumbnail( 'post-thumbnail');?>
  <?php
            if ( is_sticky() ) {?>
  <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
  <?php }?>
</figure>
</a>

<!--Gallery Start-->
<?php

$galleries = true;
if ( $galleries ) {?>    
<div class="courses-info"> 
	<h3><?php esc_html_e('Campus Gallery', 'edupress');?></h3>
<div class="thumbnails campus-gallery">
	<div class="row">
	<?php 
		$gallery_images = edupress_get_post_meta( 'EDU_PRESS_campus_gallery', array( 'type' => 'image_advanced', 'size' => 'medium' ), get_the_ID()
 );
 
 	?>
 		<?php 
		$ig=0;
		foreach( $gallery_images as $gallery_image ) {
			$ig++;
			$caption = ( !empty( $gallery_image['caption'] ) ) ? $gallery_image['caption'] : $gallery_image['alt'];?>
		<a class="fancybox-effects-a col-xs-12 col-sm-3" href="<?php echo esc_url( $gallery_image['full_url'] ); ?>" data-fancybox-group="gallery-<?php echo get_the_ID();?>" title="<?php echo esc_attr($caption);?>">
			<?php echo '<img src="' . esc_url( $gallery_image['url'] ) .'" alt="' .esc_attr( $gallery_image['title']) . '" />'; ?>
		</a>
		<?php }?>
	 </div>
  </div>
</div>
<?php }?>
<!--Gallery End-->

<div class="courses-info">
  <?php the_content(); ?>
</div>
