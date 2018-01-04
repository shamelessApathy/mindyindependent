<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package educationpress
 */

get_header(); ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Error Page', 'educationpress' ); ?></h1>
            </header><!-- .entry-header -->
        </div>
    </div>
</div>

<div class="page-spacer clearfix">
	<div id="primary">
 		<main id="main" class="site-main" >

			<section class="error-404 not-found">
            
            	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                	<span class="font-large">404 <strong><?php esc_html_e( 'page not found', 'educationpress' ); ?></strong></span>
                
				 
                 <h2 class="text-center head-border-default"><?php esc_html_e( 'Something Is Wrong', 'educationpress' ); ?></h2>

				<div class="page-content">
					<h4><?php esc_html_e( 'The page you are looking for was moved, removed, renamed 
						or might never exist. ', 'educationpress' ); ?></h4>

					 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-normal btn-medium"><?php esc_html_e( 'Go Home', 'educationpress' ); ?></a>
                     
                     </div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- page-spacer #end  --> 

<?php get_footer(); ?>
