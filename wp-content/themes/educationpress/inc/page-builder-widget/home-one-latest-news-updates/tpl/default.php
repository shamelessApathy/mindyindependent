<?php
global $educationpress_options;
$number_of_posts = intval( $news_no );
$recent_posts_args = array(
    'post_type' => 'post',
    'posts_per_page' => $number_of_posts,
    'ignore_sticky_posts' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-quote' ),
			'operator' => 'NOT IN'
		)
	)
);
if ( ( $news_types == '2' ) && ( !empty(  $news_cat ) ) ) {
    $recent_posts_args[ 'cat' ] = $news_cat;
}elseif ( ( $news_types == '3') && !empty(  $news_tag ) ) {
    $recent_posts_args[ 'tag_id' ] =  $news_tag;
}

// The Query
$recent_posts_query = new WP_Query( $recent_posts_args );
if ( $recent_posts_query->have_posts() ) :
?>
<section class="latest-news-updates">
           <div class="container text-align-center">
           		<div class="row">
                  <?php  if ( ! empty( $title ) ) {?>
                        <h2 class="text-center head-border-default"><?php echo esc_html( $title ); ?></h2>
                        <?php }?>
                        
                        <div class="articel-list">
							<?php
							$recp=0;
                            while ( $recent_posts_query->have_posts() ) {
                            $recp++;
                            $recent_posts_query->the_post();?>
                            
                        	<div class="col-xs-12 <?php if(($number_of_posts==3 && ($recp==2 || $recp==3)) || ($number_of_posts!=3 && ($recp==4 || $recp==5 || $recp==9  || $recp==10)) ){?>col-sm-3<?php }else{?>col-sm-6<?php }?> zoom">
                            	<div class="article <?php if($number_of_posts==3){ if($recp==1){ echo esc_attr("art-style3");}elseif($recp==2){echo esc_attr("art-style4");}elseif($recp==3){echo esc_attr("art-style5");}}else{ echo esc_attr("art-style").$recp;}?>"> 
                                <?php
                            if ( is_sticky() ) {?>
                            <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                            <?php }?>
                                	<h3 class="col-xs-12 col-sm-8">
                                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3> 
									<p class="meta"><?php educationpress_posted_on() ?></p>
                                    <a href="<?php the_permalink() ?>" class="img-thumb">
                                    <figure>
                                    <?php
									 if ( has_post_thumbnail() ) {
										            if($number_of_posts!=3 && ($recp==1 || $recp==2 || $recp==6 || $recp==7)){
                                                    the_post_thumbnail('educationpress-home-thumbnail1');
													}
													if($number_of_posts==3){
														if($recp==1)
														 the_post_thumbnail('educationpress-home-thumbnail3');
														 
														 if($recp==2 || $recp==3)
														 the_post_thumbnail('educationpress-home-thumbnail4');
														 
														 
													}
													if($number_of_posts!=3 && ($recp==3 || $recp==8)){
                                                    the_post_thumbnail('educationpress-home-thumbnail3');
													}
													if($number_of_posts!=3 && ($recp==4 || $recp==5 || $recp==9 || $recp==10)){
                                                    the_post_thumbnail('educationpress-home-thumbnail4');
													}
                                                }?>
                                    
                                    </figure>
                                    </a>
								</div>
                            </div>
                            <?php }?>
                            
                            
                        </div>
                        
                     </div>  <!-- row #end  -->
              </div><!-- container #end  -->
        </section>
<?php endif;
wp_reset_postdata(); ?>