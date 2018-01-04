<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package edupress
 */
global $edupress_options;

$instructors_name_with_link = edupress_kid_get_instructors_name_with_link();
?>

<div class="courses-info">
  <p class="excerpt"><?php echo strip_tags( get_the_excerpt() ); ?></p>
  <p class="meta">
    <?php if($edupress_options['edupress_classdetail_instructor']){ esc_html_e( 'Taught by: ', 'edupress' );  echo $instructors_name_with_link; }?>
    <?php if($edupress_options['edupress_classdetail_cat']){ 
	echo get_the_term_list( get_the_ID(), 'class-category', esc_html__( '. in: ', 'edupress'), ', ' ); } ?>
  </p>
</div>
<!--classs-info #end  --> 

<a class="post-thumb" href="<?php the_permalink(); ?>">
<figure>
  <?php the_post_thumbnail( 'post-thumbnail');?>
  <?php
            if ( is_sticky() ) {?>
  <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
  <?php }?>
</figure>
</a>
<div class="courses-info">
  <?php if($edupress_options['edupress_classdetail_socialshare']){?>
  <ul class="social-icons">
    <li><a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink(); ?>&p[images][0]=&p[title]=<?php the_title(); ?>&p[summary]=<?php echo urlencode( strip_tags( get_the_excerpt() ) ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
    <li><a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>"  target="_blank"><i class="fa fa-twitter"></i></a></li>
    <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    <li><a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo esc_attr(strip_tags( get_the_excerpt() )); ?>" target="_top"><i class="fa fa-envelope"></i></a></li>
  </ul>
  <?php }?>
</div>
<?php
	  if( wp_is_mobile() )
	  {
		  ?>
<div class="courses-info">
  <?php get_template_part( 'template-parts/class-co-info' ); ?>
</div>
<?php
	  }
	  ?>
<div class="courses-info">
  <?php the_content(); ?>
</div>
