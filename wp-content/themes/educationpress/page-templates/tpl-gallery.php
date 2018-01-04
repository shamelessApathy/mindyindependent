<?php
/**
 * Template Name: Gallery
 *
 * @package EducationPress\Page-Templates
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */
 
get_header(); ?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix"> 
 <div id="primary">
        <div class="container">
        	<div class="row">
                <main id="main" class="site-main col-xs-12" >
                    <?php
					$taxonomies = array('gallery-category');
					$args1 = array(
					'hide_empty' => 0
					);
					$terms = get_terms( $taxonomies, $args1);
					if(count( $terms )){?>
                     
                     <div class="text-center gallery-category">
                        <button class="btn-gallery btn-current" data-toggle="portfilter" data-target="all">
                          <?php esc_html_e('All Images','educationpress');?>
                        </button>
                        <?php foreach ( $terms as $term ) {?>
                        <button class="btn-gallery" data-toggle="portfilter" data-target="<?php echo esc_attr($term->slug) ;?>">
                            <?php echo esc_html($term->name) ;?>
                        </button>
                        <?php }?>
                        
                     </div>
                     <div class="clearfix"></div>
                     <?php }?>
                     
                <?php $galleries_args = array( 'post_type' => 'gallery', 'posts_per_page' => -1, 'post_status' => 'publish'); 
				$galleries = get_posts( $galleries_args );
				if ( $galleries ) {?>     
            	<ul class="thumbnails gallery">
                <?php foreach ( $galleries as $gallery ) {
					$term_list = wp_get_post_terms($gallery->ID, 'gallery-category', array("fields" => "slugs"));
					//print_r($term_list);
					
					$gallery_images = educationpress_get_post_meta( 'EDU_PRESS_gallery', array( 'type' => 'image_advanced', 'size' => 'medium' ), $gallery->ID );
					?>
				<li class="col-xs-12 col-xs-3" data-tag='<?php echo esc_attr(implode(" ", $term_list));?>'>
                	<?php 
					$ig=0;
					foreach( $gallery_images as $gallery_image ) {
						$ig++;
						$caption = ( !empty( $gallery_image['caption'] ) ) ? $gallery_image['caption'] : $gallery_image['alt'];?>
					<a class="fancybox-effects-a" href="<?php echo esc_url( $gallery_image['full_url'] ); ?>" data-fancybox-group="gallery-<?php echo esc_attr($gallery->ID);?>" title="<?php echo esc_attr($caption);?>">
                        <?php if($ig==1){echo '<img src="' . esc_url( $gallery_image['url'] ) .'" alt="' .esc_attr( $gallery_image['title']) . '" />';} ?>
  					</a>
                    <?php }?>
				</li>
                <?php }?>
				
			</ul>
            <?php }?>
                     
                     
                </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
 </div> <!-- page-spacer #end  --> 	 
<?php get_footer(); ?>
