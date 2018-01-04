<?php 
global $educationpress_options;

?>
	<?php
	if( !empty( $educationpress_options[ 'educationpress_twitter_url' ] )):
	?>
    	<li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_twitter_url' ];?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
    <?php
	endif;
	if( !empty( $educationpress_options[ 'educationpress_facebook_url' ] )):
	?>
    <li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_facebook_url' ];?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
    <?php
	endif;
	if( !empty( $educationpress_options[ 'educationpress_google_plus_url' ] )):
	?>
    <li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_google_plus_url' ];?>" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
    <?php
	endif;
	if( !empty( $educationpress_options[ 'educationpress_linkedin_url' ] )):
	?>
    <li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_linkedin_url' ];?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
    <?php
	endif;
	if( !empty( $educationpress_options[ 'educationpress_pinterest_url' ] )):
	?>
    <li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_pinterest_url' ];?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
    <?php
	endif;
	if( !empty( $educationpress_options[ 'educationpress_instagram_url' ] )):
	?>
    <li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_instagram_url' ];?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
    <?php
	endif;
	if( !empty( $educationpress_options[ 'educationpress_youtube_url' ] )):
	?>
    <li class="social"><a href="<?php echo $educationpress_options[ 'educationpress_youtube_url' ];?>" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
    <?php
	endif;
	?>
