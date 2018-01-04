<?php
/*
 * Latest News & Updates For Home Page Three
 */
global $educationpress_options;
$arrCats = array();
 $arrTags = array();
$number_of_news = intval( $news_no  );
$recent_news_args = array(
    'post_type' => 'post',
    'posts_per_page' => $number_of_news,
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
if ( ( $news_types== '2' ) && ( !empty(  $news_cat ) ) ) {
    $recent_posts_args[ 'cat' ] = $news_cat;
}elseif ( ( $news_types == '3') && !empty(  $news_tag ) ) {
    $recent_posts_args[ 'tag_id' ] =  $news_tag;
}
$newspost=get_posts($recent_news_args);
if(count($newspost)< $number_of_news)
{
$num_news= count($newspost)/3;
}
else
{
$num_news= $number_of_news/3;
}

if ( $newspost) :
?>
<!-- Latest News & Updates slider start-->
 <div id="latest-news-updates-slider" class="carousel slide latest-news-updates-outer" >
 
    <div class="container latest-news-updates-slider">
    	<div class="row">
         <?php  if ( ! empty( $title ) ) {?>
        <h2 class="text-center head-border-orange"><?php echo esc_html($title ); ?></h2>
         <?php }?>
   
		 
          
         
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			
            
			<!-- First slide -->
             <?php $tm=0;
		   for($i = 0; $i < $num_news; $i++) {
			   $newscat=get_the_category($newspost[$tm]->ID);
			   ?>
			<div class="item <?php if($i==0){?>active<?php }?>">
            	<div class="container">
            	 <div class="row">
                 <?php if(count($newspost)>$tm){?>
                     <article class="col-xs-12 col-sm-4 zoom">
                    	<div class="news">
                            <a href="<?php echo esc_url( get_permalink($newspost[$tm]->ID));?>" class="img-thumb ">
							<?php
                            if ( is_sticky($newspost[$tm]->ID) ) {?>
                            <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                            <?php }?>
                            <figure>
					        <?php echo get_the_post_thumbnail($newspost[$tm]->ID, 'full');?>
                            </figure>
                            </a>
                   		 
                             <div class="latest-news-updates-space">
                             <h3><a href="<?php echo esc_url( get_permalink($newspost[$tm]->ID));?>"><?php echo  ( mb_strlen( get_the_title( $newspost[$tm]->ID ) ) >= 57 ) ? esc_html(mb_substr( get_the_title( $newspost[$tm]->ID ), 0, 57 )) . '...' : esc_html(get_the_title( $newspost[$tm]->ID ));?></a></h3>
                            <p class="meta"><?php esc_html_e('by:','educationpress');?> <a href="<?php echo esc_url( get_author_posts_url( $newspost[$tm]->post_author ) );?>"><?php echo esc_html(get_the_author_meta( 'display_name', $newspost[$tm]->post_author )); ?></a> <?php esc_html_e('. in:','educationpress');?> <a href="<?php echo esc_url( get_category_link( $newscat[0]->term_id ) );?>"><?php echo esc_html( $newscat[0]->name );?></a></p>
                            <p> <?php echo mb_substr( strip_tags( $newspost[$tm]->post_content ), 0, 105 ) . '... ';?></p>
                              </div>
                      
                      </div><!-- news #end -->
                	</article> <!--article #end -->
                     <?php
				 }
				 $tm++;
				 if(count($newspost)>$tm){
				  $newscat=get_the_category($newspost[$tm]->ID);
				 ?>
                    <article class="col-xs-12 col-sm-4 zoom">
                    	<div class="news">
                             <a href="<?php echo esc_url(get_permalink($newspost[$tm]->ID));?>" class="img-thumb ">
                             <?php
                            if ( is_sticky($newspost[$tm]->ID) ) {?>
                            <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                            <?php }?>
                            <figure>
					        <?php echo get_the_post_thumbnail($newspost[$tm]->ID, 'full');?>
                            </figure>
                            </a>
                   		 
                             <div class="latest-news-updates-space">
                             <h3><a href="<?php echo esc_url(get_permalink($newspost[$tm]->ID));?>"><?php echo  ( mb_strlen( get_the_title( $newspost[$tm]->ID ) ) >= 57 ) ? esc_html(mb_substr( get_the_title( $newspost[$tm]->ID ), 0, 57 )) . '...' : esc_html(get_the_title( $newspost[$tm]->ID ));?></a></h3>
                            <p class="meta"><?php esc_html_e('by:','educationpress');?> <a href="<?php echo esc_url( get_author_posts_url( $newspost[$tm]->post_author ) );?>"><?php echo esc_html(get_the_author_meta( 'display_name', $newspost[$tm]->post_author )); ?></a> <?php esc_html_e('. in:','educationpress');?> <a href="<?php echo esc_url( get_category_link( $newscat[0]->term_id ) );?>"><?php echo esc_html( $newscat[0]->name );?></a></p>
                             <p> <?php echo mb_substr( strip_tags( $newspost[$tm]->post_content ), 0, 105 ) . '... ';?></p>
                              </div>
                      
                      </div><!-- news #end -->
                	</article> <!--article #end -->
                     <?php
				 }
				 $tm++;
				 if(count($newspost)>$tm){
				  $newscat=get_the_category($newspost[$tm]->ID);
				 ?>
                    
                    <article class="col-xs-12 col-sm-4 zoom">
                    	<div class="news">
                           <a href="<?php echo esc_url(get_permalink($newspost[$tm]->ID));?>" class="img-thumb ">
                           <?php
                            if ( is_sticky($newspost[$tm]->ID) ) {?>
                            <div class="sticky-tag"><i class="glyphicons glyphicon-star"></i> <span></span><small></small></div>
                            <?php }?>
                            <figure>
					        <?php echo get_the_post_thumbnail($newspost[$tm]->ID, 'full');?>
                            </figure>
                            </a>
                   		 
                             <div class="latest-news-updates-space">
                              <h3><a href="<?php echo esc_url(get_permalink($newspost[$tm]->ID));?>"><?php echo  ( mb_strlen( get_the_title( $newspost[$tm]->ID ) ) >= 57 ) ? esc_html(mb_substr( get_the_title( $newspost[$tm]->ID ), 0, 57 )) . '...' : esc_html(get_the_title( $newspost[$tm]->ID ));?></a></h3>
                            <p class="meta"><?php esc_html_e('by:','educationpress');?> <a href="<?php echo esc_url( get_author_posts_url( $newspost[$tm]->post_author ) );?>"><?php echo esc_html(get_the_author_meta( 'display_name', $newspost[$tm]->post_author )); ?></a> <?php esc_html_e('. in:','educationpress');?> <a href="<?php echo esc_url( get_category_link( $newscat[0]->term_id ) );?>"><?php echo esc_html( $newscat[0]->name );?></a></p>
                           <p> <?php echo mb_substr( strip_tags( $newspost[$tm]->post_content ), 0, 105 ) . '... ';?></p>
                              </div>
                      
                      </div><!-- news #end -->
                	</article> <!--article #end -->
                    <?php
				 }
				 $tm++;
				 ?>
                 </div>  <!--row #end-->     
               </div> <!-- container #end -->
 			</div> <!-- First slide -->
            <?php }?>
                      
             
  		
		</div><!-- /.carousel-inner -->
         

		 <!-- Indicators -->
		<ol class="carousel-indicators">
         <?php for($i = 0; $i < $num_news; $i++) {?>
			<li data-target="#latest-news-updates-slider" data-slide-to="<?php echo esc_attr($i);?>" <?php if($i==0){?>class="active"<?php }?>></li>
             <?php }?>
 		</ol>
        
         </div> <!-- row #end -->
	</div> <!-- container #end -->
 </div>   <!-- Latest News & Updates slider #end -->  
     
 <?php endif;?>