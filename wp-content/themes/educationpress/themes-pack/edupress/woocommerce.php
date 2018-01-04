<?php
if( edupress_is_a( 'ecom' ) )
{
	if ( is_singular( 'product' ) ) {
		woocommerce_get_template( 'single-product.php' );
	}elseif( is_archive() ){
		//For ANY product archive.
		//Product taxonomy, product search or /shop landing
		woocommerce_get_template( 'archive-product.php' );
	}
	else
	{
		woocommerce_content();	
	}

}
else
{
	
	
	get_header(); 
	
	global $edupress_options;
	?>
	  
	<div class="page-spacer clearfix">
		<div id="primary" class="content-area">
			<div class="container">
				<div class="row">
				
				
			<?php
				$main_class = "col-sm-8";
				
				
				
				
					if( edupress_is_a('ecom') )
					{
						
						if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout()) ) {
								$main_class = edupress_page_layout('edupress_cart_checkout_layout'); 
							 } 	
					}
					elseif( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout())  || (function_exists('is_account_page') && is_account_page())  )
						$main_class = "";
						
				?>
				
				
			<main id="main" class="site-main col-xs-12 <?php echo esc_attr( $main_class );?>"  >
	
				<?php woocommerce_content(); ?>
	
	
			</main><!-- #main -->
			
			<?php get_sidebar(); ?>
			</div>  <!-- #row -->
		</div><!-- #container -->
	</div> <!-- primary #end -->
	</div>
	
	<?php get_footer(); 
}
?>

