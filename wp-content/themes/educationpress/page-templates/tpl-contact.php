<?php
/**
 * Template Name: Contact Us
 *
 * @package EducationPress\Template
 * @author  ThemeCycle
 * @since   EducationPress 1.0
 */
 
 
get_header();
// Get all custom post meta information related to contact page
$contact_meta_data = get_post_custom( get_the_ID() );

$detail_title = '';
$address = '';
$display_email = '';
$facebook_url = '';
$google_url = '';
$twitter_url = '';
$linkedin_url = '';
$cus_title = '';
$cus_phone = '';
$cus_email = '';
$ques_title = '';
$ques_desc = '';
$button_text = '';
$button_url = '';

if( !empty($contact_meta_data[ 'educationpress_detail_title' ]) ) {
	$detail_title = $contact_meta_data[ 'educationpress_detail_title' ];
}
if( !empty($contact_meta_data[ 'educationpress_address' ]) ) {
	$address = $contact_meta_data[ 'educationpress_address' ];
}
if( !empty($contact_meta_data[ 'educationpress_display_email' ]) ) {
	$display_email = $contact_meta_data[ 'educationpress_display_email' ];
}
if( !empty($contact_meta_data[ 'educationpress_facebook_url' ]) ) {
	$facebook_url = $contact_meta_data[ 'educationpress_facebook_url' ];
}
if( !empty($contact_meta_data[ 'educationpress_google_url' ]) ) {
	$google_url = $contact_meta_data[ 'educationpress_google_url' ];
}
if( !empty($contact_meta_data[ 'educationpress_twitter_url' ]) ) {
	$twitter_url = $contact_meta_data[ 'educationpress_twitter_url' ];
}
if( !empty($contact_meta_data[ 'educationpress_linkedin_url' ]) ) {
	$linkedin_url = $contact_meta_data[ 'educationpress_linkedin_url' ];
}
if( !empty($contact_meta_data[ 'educationpress_cus_title' ]) ) {
	$cus_title = $contact_meta_data[ 'educationpress_cus_title' ];
}
if( !empty($contact_meta_data[ 'educationpress_cus_phone' ]) ) {
	$cus_phone = $contact_meta_data[ 'educationpress_cus_phone' ];
}
if( !empty($contact_meta_data[ 'educationpress_cus_email' ]) ) {
	$cus_email = $contact_meta_data[ 'educationpress_cus_email' ];
}
if( !empty($contact_meta_data[ 'educationpress_ques_title' ]) ) {
	$ques_title = $contact_meta_data[ 'educationpress_ques_title' ];
}
if( !empty($contact_meta_data[ 'educationpress_ques_desc' ]) ) {
	$ques_desc = $contact_meta_data[ 'educationpress_ques_desc' ];
}
if( !empty($contact_meta_data[ 'educationpress_ques_button_text' ]) ) {
	$button_text = $contact_meta_data[ 'educationpress_ques_button_text' ];
}
if( !empty($contact_meta_data[ 'educationpress_ques_button_url' ]) ) {
	$button_url = $contact_meta_data[ 'educationpress_ques_button_url' ];
}
 ?>



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
                <main id="main" class="site-main" >
                    <?php while ( have_posts() ) : the_post(); ?>
                     <div class="col-xs-12 col-sm-6 contact-form" >
                    <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'educationpress' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
    
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'educationpress' ),
                        'after'  => '</div>',
                    ) );
                ?>
                </div> <!-- contact-form #end -->
                <?php endwhile; // End of the loop. ?>
                
                
                 <!-- right col #startt -->
                 <div class="col-xs-12 col-sm-6 contact-info">
                 	 <div class="col-xs-12 col-sm-6">
                     	 <?php if(!empty($detail_title)){?>
                  		<h3 class="head-border-default"> <?php echo esc_html( $detail_title[0] ); ?></h3>
                        <?php }?>
                        <?php if(!empty($address)){?>
                        <p class="address"><i class="fa fa-map-marker"></i><?php echo esc_html( $address[0] ); ?></p>
                        <?php }?>
                        <?php if(!empty($display_email)){
							$display_email = is_email( $display_email[0] );
							?>
                        <p class="email"><i class="lnr lnr-envelope"></i><a href="mailto:<?php echo antispambot( $display_email ); ?>"><?php echo esc_html($display_email);?></a></p>
                         <?php }?>
                        
                        <ul class="social-icons">
                         <?php if(!empty($facebook_url)){?>
                    	<li><a href="<?php echo esc_url($facebook_url[0]);?>"><i class="fa fa-facebook"></i></a></li>
                        <?php }?>
                         <?php if(!empty($google_url)){?>
                        <li><a href="<?php echo esc_url($google_url[0]);?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php }?>
                         <?php if(!empty($twitter_url)){?>
                        <li><a href="<?php echo esc_url($twitter_url[0]);?>"><i class="fa fa-twitter"></i></a></li>
                        <?php }?>
                         <?php if(!empty($linkedin_url)){?>
                        <li><a href="<?php echo esc_url($linkedin_url[0]);?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php }?>
                   		</ul>
                 	</div>
                    
                    <?php if(isset($cus_phone) || isset($cus_email)){?>
                    <div class="col-xs-12 col-sm-6">
                    	 <?php if(!empty($cus_title)){?>
                 		<h3 class="head-border-default"><?php echo esc_html( $cus_title[0] ); ?></h3>
                         <?php }?>
                        <?php if(!empty($cus_phone)){?>
                        <p class="phone"><i class="fa fa-phone"></i><?php echo esc_html($cus_phone[0]);?></p>
                        <?php }?>
                        <?php if(!empty($cus_email)){?>
                        <p class="email"><i class="lnr lnr-envelope"></i><?php echo esc_html($cus_email[0]);?></p>
                         <?php }?>
                 	</div>
                    <?php }?>
                    
                    <div class="col-xs-12 col-sm-12 have-question">
                    	<?php if(isset($ques_title)){?>
                    	<h3><?php echo esc_html( $ques_title[0] ); ?></h3>
                        <?php }?>
                        <?php if(isset($ques_desc)){?>
                        <p><?php echo esc_html( $ques_desc[0] ); ?></p>
                        <?php }?>
                         <?php if(isset($button_url)){?>
                        <a href="<?php echo esc_url($button_url[0]);?>" class="btn btn-blue btn-medium"><?php echo esc_html( $button_text[0] ); ?></a>
                        <?php }?>
                    </div>
                    
                    
                 </div> <!-- right col #end -->
                
                			<?php
                            /*
     * Google Map
     */
	if ( isset( $contact_meta_data[ 'educationpress_map_address' ] ) && isset( $contact_meta_data[ 'educationpress_map_location' ] ) ) {

        if( !empty( $contact_meta_data[ 'educationpress_map_address' ][ 0 ] ) && !empty( $contact_meta_data[ 'educationpress_map_location' ][ 0 ] ) ) {

            $lat_lng = explode( ',', $contact_meta_data[ 'educationpress_map_location' ][ 0 ] );

            if( is_array( $lat_lng ) && isset( $lat_lng[0] ) && isset( $lat_lng[1] ) ) {
				?>
                <div class="col-xs-12 col-sm-12 map-location">
                	<h3 class="head-border-default"><?php esc_html_e( 'Map and Location','educationpress' ); ?></h3>
                	
                    <?php
		

                $lat = $lat_lng[0];
                $lng = $lat_lng[1];

                $map_zoom = 15;
                if( isset( $contact_meta_data[ 'educationpress_map_zoom' ] ) ) {
                    $map_zoom = intval( $contact_meta_data[ 'educationpress_map_zoom' ][ 0 ] );
                }

                ?>
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
                            icon: '<?php echo esc_url(get_template_directory_uri()) ?>/images/map-marker.svg'
                        } );

                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                </script>
               
                </div>
                
                 <?php
            }
        }
    }
    ?>
                     
                </main><!-- #main -->
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 	 
<?php get_footer(); ?>
