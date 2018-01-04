<?php
/**
 * Template part for displaying single event.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EducationPress
 */
global $educationpress_options;
?>
<article id="post-<?php the_ID(); ?>" class="events" >
	
     <!-- Image Post -->
	    <?php educationpress_standard_thumbnail();?>

	<header class="entry-header">
         <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta clearfix">
			<p class="col-xs-12 col-sm-9">
            
            <?php 
			$event_start_datetime = get_post_meta( $post->ID, 'EDU_PRESS_event_start_datetime', true );
			$event_location = get_post_meta( $post->ID, 'EDU_PRESS_event_location', true );
			
			$event_fb_url = get_post_meta( $post->ID, 'EDU_PRESS_event_fb_url', true );
			$event_twit_url = get_post_meta( $post->ID, 'EDU_PRESS_event_twit_url', true );
			$event_linked_url = get_post_meta( $post->ID, 'EDU_PRESS_event_linked_url', true );
			$event_googleplus_url = get_post_meta( $post->ID, 'EDU_PRESS_event_googleplus_url', true );
			?>
            
			<?php if( !empty( $event_start_datetime ) ) :?>
			<?php esc_html_e('on:','educationpress'); ?> <strong><?php echo  esc_html(mysql2date( get_option( 'date_format' ), get_post_meta( $post->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></strong> <small><?php esc_html_e('.','educationpress'); ?></small> 
			 <?php endif;?>
            <?php if( !empty( $event_location ) ) :?>
			<?php esc_html_e('at:','educationpress'); ?> <strong><?php echo  esc_html(get_post_meta( $post->ID, 'EDU_PRESS_event_location', true ));?></strong><small><?php esc_html_e('.','educationpress'); ?></small>
			<?php endif;?>
             <?php if( !empty( $event_start_datetime ) ) :?>
			<?php esc_html_e('Time:','educationpress'); ?> <strong><?php echo  esc_html(mysql2date( get_option( 'time_format' ), get_post_meta( $post->ID, 'EDU_PRESS_event_start_datetime', true ))) ;?></strong></p>
            <?php endif;?>
            
            <ul class="social-icons">
            	<?php if( !empty( $event_fb_url ) ) :?>
            	<li class="i_fb"><a href="<?php echo esc_url($event_fb_url);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php endif;?>
                <?php if( !empty( $event_twit_url ) ) :?>
                <li class="i_twit"><a href="<?php echo esc_url($event_twit_url);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php endif;?>
                <?php if( !empty( $event_linked_url  ) ) :?>
                <li class="i_linkin"><a href="<?php echo esc_url($event_linked_url) ;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php endif;?>
                <?php if( !empty( $event_googleplus_url ) ) :?>
                <li class="i_gplus"><a href="<?php echo esc_url($event_googleplus_url);?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <?php endif;?>
            </ul>
		</div><!-- .entry-meta -->
 	</header><!-- .entry-header -->
    <?php
	$expire_date = get_post_meta( $post->ID, 'EDU_PRESS_event_end_datetime', true );
	if($educationpress_options['educationpress_eventdetail_countdown']){
	if ( !empty( $expire_date ) && strlen($expire_date) == 16 ) 
	{
		$milliseconds = str_replace("+","",round(microtime(true) * 100));
		$milliseconds .= rand( 0, 10000 );
		$expire_date_arr=explode(' ',$expire_date);
		if($expire_date >= date('Y-m-d'))
		{?>
    <div class="event-countdown clearfix">
    <?php
			if(! empty($expire_date_arr[1])){
			$expire_date = $expire_date.":00"; 	
			}else{
			$expire_date = $expire_date." 23:59:60"; 
			}?>
    	<div class="col-xs-12 col-sm-8" id="timeleft_<?php echo esc_attr($post->ID.$milliseconds);?>">
        	<div class="col">
            	<strong>{dn}</strong>
                <span>{dl}</span>
             </div>
             <div class="col">
            	<strong>{hn}</strong>
                <span>{hl}</span>
             </div>
             <div class="col">
            	<strong>{mn}</strong>
                <span>{ml}</span>
             </div>
             <div class="col">
            	<strong>{sn}</strong>
                <span>{sl}</span>
             </div>
           
        </div>
         <script type="text/javascript">
			jQuery(document).ready(function() {		
			var dateStr ='<?php echo esc_js($expire_date);?>';
			var a=dateStr.split(' ');
			var d=a[0].split('-');
			var t=a[1].split(':');
			var date1 = new Date(d[0],(d[1]-1),d[2],t[0],t[1],t[2]);			 
			jQuery('#timeleft_<?php echo esc_js($post->ID.$milliseconds);?>').countdown({until: date1, labels: ['<?php esc_html_e('Years','educationpress'); ?>', '<?php esc_html_e('Months','educationpress'); ?>', '<?php esc_html_e('Weeks','educationpress'); ?>', '<?php esc_html_e('Days','educationpress'); ?>', '<?php esc_html_e('Hours','educationpress'); ?>', '<?php esc_html_e('Minutes','educationpress'); ?>', '<?php esc_html_e('Seconds','educationpress'); ?>'],  labels1: ['<?php esc_html_e('Year','educationpress'); ?>', '<?php esc_html_e('Month','educationpress'); ?>', '<?php esc_html_e('Week','educationpress'); ?>', '<?php esc_html_e('Day','educationpress'); ?>', '<?php esc_html_e('Hour','educationpress'); ?>', '<?php esc_html_e('Minute','educationpress'); ?>', '<?php esc_html_e('Second','educationpress'); ?>'], timezone: <?php echo esc_attr(get_option('gmt_offset'));?>, layout: jQuery('#timeleft_<?php echo esc_js($post->ID.$milliseconds);?>').html() });
			});
			</script>
            
       
         <?php 
		  $event_url = get_post_meta( $post->ID, 'EDU_PRESS_event_url', true );
		  if ( ! empty( $event_url ) ) {?>
        <a href="<?php echo esc_url($event_url);?>" class="btn btn-medium btn-normal"> <?php esc_html_e('Join Event','educationpress'); ?></a>
         <?php }?>
    </div> <!-- event-countdown #end -->
     <?php 
			 }
		}
	
	}?>

	<?php 
	if($expire_date < date('Y-m-d'))
	{?>
    <div class="alert alert-warning"><a aria-label="Close" data-dismiss="alert" class="close"><span aria-hidden="true">&times;</span></a> <?php esc_html_e('This event is expired.','educationpress'); ?></div>
    <?php
	}?>
	<div class="entry-content">
		<?php the_content(); ?>
		 
	</div><!-- .entry-content -->
    <?php if($educationpress_options['educationpress_eventdetail_map']){?>
<?php 

	// Get all custom post meta information related to contact page
	$contact_meta_data = get_post_custom( get_the_ID() );
	/*
	* Google Map
	*/
	
    if ( isset( $contact_meta_data[ 'EDU_PRESS_event_location' ] ) && isset( $contact_meta_data[ 'EDU_PRESS_eventmap_location' ] ) ) {

        if( !empty( $contact_meta_data[ 'EDU_PRESS_event_location' ][ 0 ] ) && !empty( $contact_meta_data[ 'EDU_PRESS_eventmap_location' ][ 0 ] ) ) {

            $lat_lng = explode( ',', $contact_meta_data[ 'EDU_PRESS_eventmap_location' ][ 0 ] );

            if( is_array( $lat_lng ) && isset( $lat_lng[0] ) && isset( $lat_lng[1] ) ) {

                $lat = $lat_lng[0];
                $lng = $lat_lng[1];

                $map_zoom = 15;?>
                <div class="google-map-wrapper">
                    <div id="map-canvas"></div>
                </div>
                <script>
                    function initialize() {

                        var locationLatLng = new google.maps.LatLng( <?php echo esc_attr( $lat ); ?>, <?php echo esc_attr( $lng ); ?> );

                        var mapCanvas = document.getElementById( 'map-canvas' );

                        var mapOptions = {
                            center: locationLatLng,
                            zoom: <?php echo esc_attr( $map_zoom ); ?>,
                            zoomControl: true,
                            zoomControlOptions: {
                                style: google.maps.ZoomControlStyle.SMALL
                            },
                            panControl: false,
                            mapTypeControl: true,
                            scrollwheel: false,
                            styles: [
                                {
                                    "featureType": "administrative",
                                    "elementType": "labels.text.fill",
                                    "stylers": [
                                        {
                                            "color": "#444444"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "landscape",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "color": "#f2f2f2"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi.business",
                                    "elementType": "geometry.fill",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "saturation": -100
                                        },
                                        {
                                            "lightness": 45
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.highway",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "simplified"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.arterial",
                                    "elementType": "labels.icon",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "transit",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "all",
                                    "stylers": [
                                        {
                                            "color": "#b4d4e1"
                                        },
                                        {
                                            "visibility": "on"
                                        }
                                    ]
                                }
                            ]
                        };

                        var officeMap = new google.maps.Map( mapCanvas, mapOptions );

                        var marker = new google.maps.Marker( {
                            position: locationLatLng,
                            map: officeMap,
                            icon: '<?php echo esc_url(get_template_directory_uri()); ?>/images/map-marker.svg'
                        } );

                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                </script>
                <?php
            }
        }
    }?>
 <?php }?>
  </article><!-- #event-## -->
