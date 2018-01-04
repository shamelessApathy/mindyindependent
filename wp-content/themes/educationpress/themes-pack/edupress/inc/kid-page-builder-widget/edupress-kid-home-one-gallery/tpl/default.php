<?php
/**
 * @var $title
 * @var $desc
 */

?>

<section class="fun-gallery">
    <div class="container">
        <div class="row">
        
        	<div class="col-xs-12">
        	<h3><span><?php echo esc_html($title_prefix);?></span> <?php echo esc_html($title);?></h3>
            
            <?php
				echo $desc;				
			?>
       
            
            
<!-- flexslider start -->
<div class="flexslider fun-gallery-slider">
  <ul class="slides">
  	<?php
	$galleries_args = array(
								'post_type' => 'gallery',
								'posts_per_page' => $post_no,
								'post_status' => 'publish',								
								'orderby' => 'date',
								'order' => 'DESC'
								
							); 
							
	if( is_array( $gallery_cat_ids ) && count( $gallery_cat_ids ) > 0) {
		$galleries_args['tax_query'] = array(
					array(
						'taxonomy' => 'gallery-category',
						'field'    => 'term_id',
						'terms'    => $gallery_cat_ids,
						'operator' => 'IN',
					),
		);		
	}
	
	
	
	$the_query = new WP_Query( $galleries_args ); 
	
	
	
	$gallery_images = array();
	if ( $the_query->have_posts() ) : 
		while ( $the_query->have_posts() ) : $the_query->the_post(); 
		
			       $temp_images = edupress_get_post_meta( 'EDU_PRESS_gallery', array( 'type' => 'image_advanced', 'size' => 'edupress-kid-home-one-gallery' ), get_the_ID() );
				   
				   
				
			
					$gallery_images  = array_values( $temp_images  );	
					?>
					<li>
                    <?php
					if(  is_array($gallery_images) && count($gallery_images) >  0 ):
						$image = $gallery_images[0] ;
						$attach_image = wp_get_attachment_image_src( $image['ID'], 'edupress-kid-home-one-gallery-big' );
						
						$caption = ( !empty( $image['caption'] ) ) ? $image['caption'] : $image['alt'];
					?>
                    	<div class="col-xs-12 col-sm-6">
                            <div class="row">
                                <img src="<?php echo esc_url( $attach_image[0]);?>" alt="<?php echo esc_attr( $image['title']);?>"   title="<?php echo esc_attr($caption);?>" width="555" 
                                height="374" />
                            </div>
                       </div>
                       <div class="col-xs-12 col-sm-6 slide-right">
						<?php
						//unset($gallery_images[0]);
						$gallery_images = array_values( $gallery_images );
						//$p = 0;
                        foreach( $gallery_images as $key=>$image)
                        {
							if( $key == 0)
								continue;
							
							if( $key >= 5)	
								break;
								
							//$p++;
                            //$key_inc = $key + 1;
							if( $key % 2 == 1)
							{
                        ?>
                        		<div class="col-sm-6">
                        <?php
							}
							?>
                           
                                        <?php
										$attach_image = wp_get_attachment_image_src( $image['ID'], 'edupress-kid-home-one-gallery', true );
										/*
										echo '<pre>';
print_r($attach_image);
echo '</pre>';
die;
*/
                                        $caption = ( !empty( $image['caption'] ) ) ? $image['caption'] : $image['alt'];
                                        ?>
                                        <a class="fancybox" href="<?php echo esc_url( $image['full_url'] ); ?>"  title="<?php echo esc_attr($caption);?>">
                                            <img src="<?php echo esc_url( $attach_image[0] );?>" alt="<?php echo esc_attr( $image['title']);?>" draggable="false"  />
                                         </a>
                            <?php
							//width="263" height="193"
                            if( $key % 2 == 0)
							{
                        ?>
                        		</div>
                        <?php
							}
							?> 
                        <!-- #item end --> 
                        <?php
                        }
                        //end for each;
						for( $i = $key + 1; $i <= 4; $i++)
						{
							
                            //$key_inc = $key + 1;
							if( $i % 2 == 1)
							{
							?>
									<div class="col-sm-6">
							<?php
							}
							?>
							<img src="<?php echo get_template_directory_uri().'/images/img-not-available-263-193.jpg';?>" alt="" />
                            <?php
							//width="263" height="193"
                            if( $i % 2 == 0)
							{
                        ?>
                        		</div>
                        <?php
							}
							?> 
                              <?php
						}
						
                    else:
                        ?>
						<div class="col-xs-12 col-sm-6">
                            <div class="row">
                                <img src="<?php echo get_template_directory_uri().'/images/img-not-available-555-314.jpg';?>" alt="" />
                            </div>
                       </div>
                       
                       <div class="col-xs-12 col-sm-6 slide-right">
                            <div class="col-sm-6">
                                <img src="<?php echo get_template_directory_uri().'/images/img-not-available-263-193.jpg';?>" alt="" />
                                <img src="<?php echo get_template_directory_uri().'/images/img-not-available-263-193.jpg';?>" alt="" />
                              </div>
                            
                            <div class="col-sm-6">
                                <img src="<?php echo get_template_directory_uri().'/images/img-not-available-263-193.jpg';?>" alt="" />
                                <img src="<?php echo get_template_directory_uri().'/images/img-not-available-263-193.jpg';?>" alt="" />
                              </div>
                       </div>
                    <?php
					endif;
					?>
                    </li>
					
			
            <?php
            /*
			if( is_array( $temp_images ) && count($temp_images) > 0) 
				$gallery_images = array_merge($gallery_images, $temp_images);
			*/
				
		endwhile; 
		wp_reset_postdata(); 
    else : 
		//Nothing to do
    endif; 
	?>
  </ul>
</div>
<!-- flexslider #end -->

			<?php
			if( !empty( $btn_url ) )
			{
			?>
			<div class="text-center col-xs-12">
				<a href="<?php echo esc_url($btn_url);?>" data-animation="animated zoomInUp" <?php 
				if( isset($btn_newwindow) && $btn_newwindow){?> target="_blank" <?php } ?> class="btn btn-medium btn-blue"><?php echo esc_html($btn_text);?> <i class="lnr lnr-arrow-right"></i></a>
 			</div>  
            <?php
			}
			?>
            </div> <!-- col-xs-12 #end -->
        </div><!-- row #end -->
    </div> <!-- container #end -->
</section>  <!-- Fun Gallery #end -->   



