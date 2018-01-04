<?php
/**
 * Template Name:  Coming Soon
 *
 * @package EducationPress\Page-Templates
 * @author  ThemeCycle
 * @since   EducationPress 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/assets/css/comming-soon.css" type="text/css" />
<?php
remove_action( 'wp_enqueue_scripts', 'educationpress_scripts' );
wp_enqueue_script( 'educationpress-countdown-plugin',get_template_directory_uri().'/assets/js/jquery.plugin.min.js',array( 'jquery' ) );
wp_enqueue_script( 'educationpress-countdown-script',get_template_directory_uri().'/assets/js/jquery.countdown.min.js');
wp_head(); 
?>
 <style type="text/css">
<?php
global $educationpress_options;
if( !empty($educationpress_options['educationpress_coming_soon_bg']) ) {
	$educationpress_coming_soon_bg=$educationpress_options['educationpress_coming_soon_bg'];
} 
else {
	$educationpress_coming_soon_bg = '';	
}
	
	

$coming_soon_headings_font=$educationpress_options['educationpress_coming_soon_headings_font'];
$coming_soon_body_font=$educationpress_options['educationpress_coming_soon_body_font'];
if(count($educationpress_coming_soon_bg)>0)
 {
	if(is_array($educationpress_coming_soon_bg) && array_key_exists("url",$educationpress_coming_soon_bg) && $educationpress_coming_soon_bg['url']!='')
	{?>
	.page-under-construction { background:url(<?php echo esc_url($educationpress_coming_soon_bg['url']) ;?>) no-repeat center top; background-size:cover; }
    <?php	 
	}
 }
?>
    body, p, ul, li, ol li, h4 { font-size:<?php echo esc_attr($coming_soon_body_font['font-size']);?>; font-family:<?php echo esc_attr($coming_soon_body_font['font-family']);?>; font-weight:<?php echo esc_attr($coming_soon_body_font['font-weight']);?>; color:<?php echo esc_attr($coming_soon_body_font['color']);?>;  }
	h1 { font-size:<?php echo esc_attr($coming_soon_headings_font['font-size']);?>; }
	h1, h2, h3, h5, h6 { font-family:<?php echo esc_attr($coming_soon_headings_font['font-family']);?>; color:<?php echo esc_attr($coming_soon_headings_font['color']);?>; font-weight:<?php echo esc_attr($coming_soon_headings_font['font-weight']);?>; }
	
</style>

</head>

<body <?php body_class('page-under-construction'); ?>>
<div class="construction">
   		<?php if ( ! empty( $educationpress_options['educationpress_coming_soon_title'] ) ) {?>
        <h1 class="entry-title"><?php echo esc_html( $educationpress_options['educationpress_coming_soon_title'] ); ?></h1>
		<?php }?>
        
        <?php if ( ! empty( $educationpress_options['educationpress_coming_soon_desc'] ) ) {?>
        <?php echo  $educationpress_options['educationpress_coming_soon_desc'] ; ?>
		<?php }?>
        
		<?php
		
		
			if ( $educationpress_options[ 'educationpress_coming_soon_countdown' ]  &&  !empty( $educationpress_options['educationpress_coming_soon_countdowndate'] ) ) 
			{
				 $expire_date_arr = explode('/',$educationpress_options[ 'educationpress_coming_soon_countdowndate' ]);
				 $expire_date = $expire_date_arr[2].'-'.$expire_date_arr[0].'-'.$expire_date_arr[1];
			if ( !empty( $expire_date )) 
			{
				$milliseconds = str_replace("+","",round(microtime(true) * 100));
				$milliseconds .= rand( 0, 10000 );
				$expire_date_arr=explode(' ',$expire_date);
				if($expire_date >= date('Y-m-d'))
				{?>
				<a href="#bottom"><i class="arrow-down"></i></a>  
				 <?php $expire_date = $expire_date." 23:59:60"; ?>          
				<div class="countdown" id="timeleft_<?php echo esc_attr($post->ID.$milliseconds);?>">
					<span class="days">{dn}<small>{dl}</small></span>
					<span class="hours">{hn}<small>{hl}</small></span>
					<span class="min">{mn}<small>{ml}</small></span>
					<span class="sec">{sn}<small>{sl}</small></span>
				</div>
				<script type="text/javascript">
				jQuery(document).ready(function() {		
				var dateStr ='<?php echo esc_attr($expire_date);?>'
				var a=dateStr.split(' ');
				var d=a[0].split('-');
				var t=a[1].split(':');
				var date1 = new Date(d[0],(d[1]-1),d[2],t[0],t[1],t[2]);			 
				jQuery('#timeleft_<?php echo esc_attr($post->ID.$milliseconds);?>').countdown({until: date1, labels: ['<?php esc_html_e('Years','educationpress'); ?>', '<?php esc_html_e('Months','educationpress'); ?>', '<?php esc_html_e('Weeks','educationpress'); ?>', '<?php esc_html_e('Days','educationpress'); ?>', '<?php esc_html_e('Hours','educationpress'); ?>', '<?php esc_html_e('Minutes','educationpress'); ?>', '<?php esc_html_e('Seconds','educationpress'); ?>'],  labels1: ['<?php esc_html_e('Year','educationpress'); ?>', '<?php esc_html_e('Month','educationpress'); ?>', '<?php esc_html_e('Week','educationpress'); ?>', '<?php esc_html_e('Day','educationpress'); ?>', '<?php esc_html_e('Hour','educationpress'); ?>', '<?php esc_html_e('Minute','educationpress'); ?>', '<?php esc_html_e('Second','educationpress'); ?>'], timezone: <?php echo esc_attr(get_option('gmt_offset'));?>, layout: jQuery('#timeleft_<?php echo esc_attr($post->ID.$milliseconds);?>').html() });
				});
				</script>
				<?php 
					}
				}
		}?>
            
           <?php if ( $educationpress_options[ 'educationpress_newsletter' ] ) {?> 
            <div class="newsletter">
				<?php if ( ! empty( $educationpress_options['educationpress_newsletter_title'] ) ) {?>
                <h3><?php echo esc_html( $educationpress_options['educationpress_newsletter_title'] ); ?></h3>
                <?php  }?>
                <?php if ( ! empty( $educationpress_options['educationpress_newsletter_shortcode'] ) ) {?>
            	<?php  echo do_shortcode($educationpress_options['educationpress_newsletter_shortcode']);?>
                 <?php  }?>
            </div>
            <?php 
		   }?>
             
            <!--<p class="copyright"><a name="bottom"></a>Copyright 2009 - 2015 Educations. All Rights Reserved</p>-->
             <?php if ( ! empty( $educationpress_options['educationpress_copyright_html'] ) ) {?>
        <p class="copyright">
        <?php echo wp_kses($educationpress_options['educationpress_copyright_html'],
                            array(
                                'a' => array(
                                    'href' => array(),
                                    'title' => array(),
                                    'target' => array(),
                                ),
                                'em' => array(),
                                'strong' => array(),
                            ) ); ?>
        </p>
       <?php } ?>
            
           
</div>

<?php wp_footer(); 
?>
</body>
</html>