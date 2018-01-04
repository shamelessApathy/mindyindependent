<div class="col-xs-12 widget event-widget event-widget-two">
<header><h3><?php echo esc_html( $title );?></h3></header>
<?php
	$latest_event_args = array(
						'post_type' => 'event',
						'posts_per_page' => intval($event_no),
						'ignore_sticky_posts' => 1,
						'post_status' => 'publish',
						'no_found_rows' => true,
						);
	$latest_events=get_posts($latest_event_args); 
?>
    <ul>
    	<?php
		foreach( $latest_events as $event):
		
		
		?>
			<li>
				<div class="calendar">
					<span class="month"><?php echo get_the_date('M', $event->ID);?></span>
					<span class="date"><?php echo get_the_date('d', $event->ID);?></span>
				</div>
				 <div class="simi-co">
					<p class="title"><a href="<?php echo get_the_permalink($event->ID);?>"><?php echo esc_html($event->post_title);?></a></p>
					<p class="date">
						<?php //echo get_the_date('F j, Y', $event->ID);?>
                        <?php
						if( get_post_meta( $event->ID, 'EDU_PRESS_event_start_datetime', true ) 
						&& get_post_meta( $event->ID, 'EDU_PRESS_event_start_datetime', true )) :
						
						   echo esc_html(
												date('M j,Y',
	strtotime(get_post_meta( $event->ID, 'EDU_PRESS_event_start_datetime', true ) )
													)
												) ;    
												
												
							esc_html_e( ' - ','edupress' );
							echo esc_html(
												date('M j,Y',
	strtotime(get_post_meta( $event->ID, 'EDU_PRESS_event_end_datetime', true ) )
													)
												) ;  				
															 
						endif;
						?>     
                    </p>
					<p class="location"><i class="fa fa-map-marker"></i> <?php echo  esc_html(get_post_meta( $event->ID, 'EDU_PRESS_event_location', true ));?></p>
				</div>
			</li>
        <?php
			endforeach;
		?>
    </ul>
</div>