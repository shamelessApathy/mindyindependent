<?php 
global $edupress_options;
?>
<ul class="social">
	<?php
	if( !empty( $edupress_options[ 'edupress_twitter_url' ] )):
	?>
    	<li><a href="<?php echo $edupress_options[ 'edupress_twitter_url' ];?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <?php
	endif;
	if( !empty( $edupress_options[ 'edupress_facebook_url' ] )):
	?>
    <li><a href="<?php echo $edupress_options[ 'edupress_facebook_url' ];?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
    <?php
	endif;
	if( !empty( $edupress_options[ 'edupress_google_plus_url' ] )):
	?>
    <li><a href="<?php echo $edupress_options[ 'edupress_google_plus_url' ];?>" target="_blank"><i class="fa fa-google"></i></a></li>
    <?php
	endif;
	if( !empty( $edupress_options[ 'edupress_linkedin_url' ] )):
	?>
    <li><a href="<?php echo $edupress_options[ 'edupress_linkedin_url' ];?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
    <?php
	endif;
	if( !empty( $edupress_options[ 'edupress_pinterest_url' ] )):
	?>
    <li><a href="<?php echo $edupress_options[ 'edupress_pinterest_url' ];?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
    <?php
	endif;
	if( !empty( $edupress_options[ 'edupress_instagram_url' ] )):
	?>
    <li><a href="<?php echo $edupress_options[ 'edupress_instagram_url' ];?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
    <?php
	endif;
	if( !empty( $edupress_options[ 'edupress_youtube_url' ] )):
	?>
    <li><a href="<?php echo $edupress_options[ 'edupress_youtube_url' ];?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
    <?php
	endif;
	?>
</ul>