<?php
/*
 * Upcoming Event For Home Page Two
 */
 ?>
 
<div class="col-xs-12"> 
<?php  if ( ! empty( $title ) ) {?>
<h3><?php echo esc_html( $title); ?></h3>
<?php }?>
<?php 
	$upcoming_event_args = array(
	'post_type' => 'event',
	'posts_per_page' => 1,
	'ignore_sticky_posts' => 1,
	);
	$upcoming_events=get_posts($upcoming_event_args); 
	if(count($upcoming_events)){
	?>
<div class="events-vtwo">
    <a href="<?php echo esc_url(get_permalink($upcoming_events[0]->ID));?>">
    	<?php 
		if( get_the_post_thumbnail( $upcoming_events[0]->ID, 'edupress-kid-class-thumbnail' ) ):
			echo get_the_post_thumbnail( $upcoming_events[0]->ID, 'edupress-kid-class-thumbnail' );
        else:			
								?>
				<img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg"  width="360" height="270"  />
		 <?php
         endif;
         ?>
    </a>
    <div class="event-info">
    <p class="meta"><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( $upcoming_events[0]->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></p>
    <h3><a href="<?php echo esc_url(get_permalink($upcoming_events[0]->ID));?>"><?php echo esc_html(get_the_title($upcoming_events[0]->ID )); ?></a></h3>
    <p class="location"><?php echo  esc_html(get_post_meta( $upcoming_events[0]->ID, 'EDU_PRESS_event_location', true ));?> <span class="time"><?php echo  esc_html(mysql2date( get_option( 'time_format' ), get_post_meta( $upcoming_events[0]->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></span></p>
    <p><?php
	if(!empty($upcoming_events[0]->post_excerpt)){
		 $limit = 13;
			$excerpt = explode(' ', $upcoming_events[0]->post_excerpt, $limit);
		  if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		  } else {
			$excerpt = implode(" ",$excerpt);
		  }	
		  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		  echo esc_html($excerpt);
	}
	else
	{
		
		
	}?></p>
    </div>
</div>
	<?php
	}
	?>
</div> <!-- col 1 #end -->