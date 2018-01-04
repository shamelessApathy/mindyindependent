<?php
/**
 * @var $title
 */
?>

<section class="our-teachers">
    <div class="container">
        <div class="row">
        	<div class="col-xs-12">
        	<h3><span><?php echo esc_html($title_prefix);?></span> <?php echo esc_html($title);?></h3>
            <?php
				echo $desc;
			?>
            	
            </div>
    
    
    <div id="owl-teachers" class="owl-carousel">   
    		<?php
			if( 'date' == $teachers_orderby )
			{
				$user_orderby =	'registered';
				$user_order =  'DESC';
			}
			elseif( 'title' == $teachers_orderby )
			{
				$user_orderby =	'display_name';
				$user_order =  'ASC';
			}
			
			$number = $teachers_no;
			
			 $user_fields = array( 'ID','display_name','user_email');
			 $page =  1;
			 $offset = ($page - 1) * $number;
			if ( is_multisite() ) 
			{
				$args1 = array (
					'blog_id'         => get_current_blog_id(),
					'number'         => $number,
					'offset' => $offset ,
					'order'          => $user_order,
					'orderby'        => $user_orderby,
					'fields'         => $user_fields,
				);
			}else{
				$args1 = array (
					'number'         => $number,
					'offset' => $offset ,
					'order'          => $user_order,
					'orderby'        => $user_orderby,
					'fields'         => $user_fields,
				);
			}
			
			
			
			$author_ids = edupress_kid_get_instructors_id_of_class();
			$args1[ 'include' ] = $author_ids;
			
			
			// The User Query
			$user_query = new WP_User_Query( $args1 );
			$total_authors = $user_query->get_total();
			
			global $edupress_options;
			$edupress_ecommerce_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
			
			
         	// The User Loop
			if ( ! empty( $user_query->results ) ) {
				$total_pages = ceil($total_authors / $number) ;
				?>
			 
					   <?php
					   $counter = 0;
					   foreach ( $user_query->results as $user ) 
					   {
						   $counter++;
						   $job_title = get_the_author_meta( 'job_title',$user->ID);
							$mob_num = get_the_author_meta( 'mob_num',$user->ID);
							$autho_description = strip_tags( get_the_author_meta( 'description',$user->ID  ));
							?>
                                    <div class="col-xs-12">
                                        <div class="teachers">
                                            <a href="<?php echo esc_url( home_url('/'.$edupress_kid_instructor_slug.'/'.$user->display_name)); ?>"><?php echo get_avatar( $user->ID, 135);?></a>
                                            <div class="col-sm-9">
                                                <h3><a href="<?php echo esc_url( home_url('/'.$edupress_kid_instructor_slug.'/'.$user->display_name)); ?>"><?php echo esc_html($user->display_name);?></a></h3>
                                                <p class="meta"><?php echo $job_title;?></p>
                                                <?php
                                               	$inst_desc = ( mb_strlen( $autho_description ) >= 70 ) ? mb_substr( $autho_description, 0, 70 ) . '...' : $autho_description;?>
					
					                         <p><?php echo esc_html($inst_desc) ;?></p>
                                            <?php 
											$facebook_url = get_the_author_meta( 'facebook_url' ,$user->ID);
											$twitter_url = get_the_author_meta( 'twitter_url',$user->ID );
											$google_plus_url = get_the_author_meta( 'google_plus_url',$user->ID );
											$linkedin_url = get_the_author_meta( 'linkedin_url',$user->ID );
											$pinterest_url = get_the_author_meta( 'pinterest_url',$user->ID );
											$instagram_url = get_the_author_meta( 'instagram_url',$user->ID );
											$youtube_url = get_the_author_meta( 'youtube_url',$user->ID );
											?>
                                            <ul class="social-icons">
                                            	<?php if( !empty( $twitter_url ) ) :?>
                            <li><a href="<?php echo esc_url($twitter_url);?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif;?>
                             <?php if( !empty( $facebook_url ) ) :?>
                            <li><a href="<?php echo esc_url($facebook_url);?>"><i class="fa fa-facebook-square"></i></a></li>
                            <?php endif;?>
                             <?php if( !empty( $linkedin_url ) ) :?>
                            <li><a href="<?php echo esc_url($linkedin_url);?>"><i class="fa fa-linkedin-square"></i></a></li>
                            <?php endif;?>
                            <?php if( !empty( $google_plus_url ) ) :?>
                            <li><a href="<?php echo esc_url($google_plus_url);?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif;?>
                            <?php if( !empty( $pinterest_url ) ) :?>
                            <li><a href="<?php echo esc_url($pinterest_url);?>"><i class="fa fa-pinterest"></i></a></li>
                             <?php endif;?>
                            <?php if( !empty( $instagram_url ) ) :?>
                            <li><a href="<?php echo esc_url($instagram_url);?>"><i class="fa fa-instagram"></i></a></li>
                             <?php endif;?>
                            <?php if( !empty( $youtube_url ) ) :?>
                            <li><a href="<?php echo esc_url($youtube_url);?>"><i class="fa fa-youtube"></i></a></li>
                            <?php endif;?> 
                                            </ul>
                                            
                                            <a href="<?php echo esc_url( home_url('/'.$edupress_kid_instructor_slug.'/'.$user->display_name)); ?>" class="btn btn-medium btn-default"><?php echo esc_html( $btn_text );?> <i class="lnr lnr-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- teachers #end -->
          						<?php
				 }
		}?>  
          
       </div>      <!-- teachers slider #end -->

     		</div><!-- row #end -->
    </div> <!-- container #end -->
</section>  <!-- Our Blog #end -->  