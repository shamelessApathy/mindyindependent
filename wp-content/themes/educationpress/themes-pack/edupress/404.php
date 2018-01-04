<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package edupress
 */

get_header(); 
global $edupress_options;
if( edupress_is_a( 'ecom' ) || edupress_is_a( 'kid' ) || (edupress_is_a( 'uni' ) && !empty($edupress_options['edupress_header_variation']) && $edupress_options['edupress_header_variation']=='2') )
{
?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Error Page', 'edupress' ); ?></h1>
            </header><!-- .entry-header -->
        </div>
    </div>
</div>
<?php
}
?>
  
<div class="page-spacer clearfix">
	<div id="primary">
 		<main id="main" class="site-main" >
			 <?php
            if(edupress_is_a( 'uni' ) && !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1')
			{
				?>
                <div class="container">
                     <header class="entry-header">
                        <h1 class="entry-title"><?php esc_html_e( '404 Error Page', 'edupress' ); ?></h1>
                    </header><!-- .entry-header -->
				</div>                
                
                <?php
			}
			?>
			<section class="error-404 not-found">
            
            	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                	<span class="font-large">404 <strong><?php esc_html_e( 'page not found', 'edupress' ); ?></strong></span>
                
				 
                 <h2 class="text-center head-border-default"><?php esc_html_e( 'Something Is Wrong', 'edupress' ); ?></h2>

				<div class="page-content">
					<h4><?php esc_html_e( 'The page you are looking for was moved, removed, renamed 
						or might never exist. ', 'edupress' ); ?></h4>

					 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-normal btn-medium"><?php esc_html_e( 'Go Home', 'edupress' ); ?></a>
                     
                     </div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- page-spacer #end  --> 

<?php get_footer(); ?>
