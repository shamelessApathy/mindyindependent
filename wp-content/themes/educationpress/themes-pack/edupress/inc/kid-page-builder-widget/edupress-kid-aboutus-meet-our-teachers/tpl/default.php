<?php
/**
 * @var $title
 * @var $orderby
 * @var $order
 */
?>
<section class="meet-teachers">
            <div class="container">
            	<div class="row">
                <?php if ( ! empty( $title ) ) {?>		
                    <h2 class="text-center head-border-default"><?php echo esc_html( $title ); ?></h2>
                <?php }?>
            	<?php 
				// WP_User_Query arguments
				if ( ! empty( $orderby ) ) {
					$user_orderby = $orderby;
				}else{
					$user_orderby = 'user_registered';
				}
				
				if ( ! empty( $order ) ) {
					$user_order = $order;
				}else{
					$user_order = 'DESC';
				}
				$user_fields = array( 'ID','display_name');
				if ( is_multisite() ) 
				{
				$args1 = array (
					'blog_id'         => get_current_blog_id(),
					'number'         => 6,
					'order'          => $user_order,
					'orderby'        => $user_orderby,
					/*
					'meta_query'     => array(
						array(
							'key'       => $wpdb->prefix.'role_ins',
							'value'     => 'instructor',
							'compare'   => '=',
						),
					),
					*/
					'fields'         => $user_fields,
				);
				}else{
				$args1 = array (
					'number'         => 6,
					'order'          => $user_order,
					'orderby'        => $user_orderby,
					/*
					'meta_query'     => array(
						array(
							'key'       => 'role_ins',
							'value'     => 'instructor',
							'compare'   => '=',
						),
					),
					*/
					'fields'         => $user_fields,
				);	
				}
				
				
				
				$author_ids = edupress_kid_get_instructors_id_of_class();
				$args1[ 'include' ] = $author_ids;

				
				// The User Query
				$user_query = new WP_User_Query( $args1 );

				 
				global $edupress_options;
				$edupress_university_instructor_slug = !empty( $edupress_options['edupress_instructor_slug'] ) ? $edupress_options['edupress_instructor_slug'] : 'instructor';
					

				// The User Loop
				if ( ! empty( $user_query->results ) ) {
					foreach ( $user_query->results as $user ) 
					{	
				?>	
                        <div class="col-xs-12 col-sm-2 teacher">
                            <a href="<?php echo esc_url(home_url('/'.$edupress_university_instructor_slug.'/'.$user->display_name)); ?>"><?php echo get_avatar( $user->ID, 300);?></a>
                            <h4><a href="<?php echo esc_url(home_url('/'.$edupress_university_instructor_slug.'/'.$user->display_name)); ?>"><?php echo esc_html($user->display_name);?> </a></h4>
                            <?php if( get_user_meta( $user->ID,'job_title', true)){ ?>
                            <p class="post"><?php echo esc_html(get_user_meta( $user->ID,'job_title', true));?></p>
                            <?php }?>
                            <ul class="social-icons">
                                 <?php if( get_user_meta( $user->ID,'facebook_url', true)){ ?>
                                <li><a target="_blank" href="<?php echo esc_url( get_user_meta( $user->ID,'facebook_url', true) ); ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                 <?php if( get_user_meta( $user->ID,'twitter_url', true)){ ?>
                                <li><a target="_blank" href="<?php echo esc_url( get_user_meta( $user->ID,'twitter_url', true) ); ?>"><i class="fa fa-twitter"></i></a></li>
                                 <?php }?>
                                 <?php if( get_user_meta( $user->ID,'linkedin_url', true)){ ?>
                                <li><a target="_blank" href="<?php echo esc_url( get_user_meta( $user->ID,'linkedin_url', true) ); ?>"><i class="fa fa-linkedin"></i></a></li>
                                 <?php }?>
                            </ul>
                         </div> <!-- teacher #end -->
                 <?php 
					}
				}
				?>
                
               </div> <!--row #end  -->
         </div><!-- container #end -->
    </section>