<style>
	.banner_with_btn1 {
		color:<?php echo $button1_color;?> !important;
		background:<?php echo $button1_bgcolor;?> !important;
	} 
	.banner_with_btn1:hover {
		 color:<?php echo $button1_hover_color;?> !important; 
		 background:<?php echo $button1_hover_bgcolor;?> !important;
	}
	.banner_with_btn2 {
		color:<?php echo $button2_color;?> !important; 
		background:<?php echo $button2_bgcolor;?> !important;
	} 
	.banner_with_btn2:hover 
	{ 
		color:<?php echo $button2_hover_color;?> !important; 
		background:<?php echo $button2_hover_bgcolor;?> !important; 
	}
</style>

<div class="container">

	<div class="row text-spacer">
    	<h3><?php echo esc_html( $title ); ?></h3>
        <p><?php	echo edupress_escape_desc( $desc );?></p>
        <a href="<?php if( !empty($button1_url) ){ echo $button1_url; }?>" class="btn btn-medium btn-blue banner_with_btn1"   <?php if( isset( $button1_newwindow ) && $button1_newwindow ) { ?> target="_blank" <?php } ?>><?php echo esc_html( $button1_text );?></a>
        <a href="<?php if( !empty($button2_url) ){ echo $button2_url; }?>" class="btn btn-medium btn-blue banner_with_btn2"   <?php if( isset( $button2_newwindow ) && $button2_newwindow ) { ?> target="_blank" <?php } ?>><?php echo esc_html( $button2_text );?></a>
    </div>

</div>
