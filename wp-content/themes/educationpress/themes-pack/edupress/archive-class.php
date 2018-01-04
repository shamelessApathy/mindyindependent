<?php
/**
 * The template for displaying events archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edupress
 */

get_header();
global $edupress_options; ?>

<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php
			//echo "<pre>";
			/*
			 var_dump( is_page_template(array('kid-page-templates/tpl-classes.php','kid-page-templates/tpl-classes-grid-2-col.php','kid-page-templates/tpl-classes-grid-3-col.php','kid-page-templates/tpl-classes-list.php' ))  );
			 die;
			 */
			 ?>
			<h1 class="entry-title">
            <?php
			if( isset( $GLOBALS['wp_query']->queried_object->ID ) && intval( $GLOBALS['wp_query']->queried_object->ID ) > 0 ) 
			{
				echo get_the_title( intval($GLOBALS['wp_query']->queried_object->ID) );
			}
			elseif( is_search() ) {
				echo sprintf( __( 'Search Results: &ldquo;%s&rdquo;', 'edupress' ), get_search_query() );
			}
			elseif(  is_tax( 'class-category' )  &&
			 !empty( $GLOBALS['wp_query']->queried_object->name ) )
			{
				echo esc_html__('Category: ', 'edupress').esc_html($GLOBALS['wp_query']->queried_object->name );
			}
			else
			{
				the_archive_title(); 
			}
			
			if( is_archive() ) {
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			}
			?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<div class="page-spacer clearfix">
  <div id="primary">
        <div class="container">
        	<div class="row">
            	<?php
				$main_class = edupress_page_layout('edupress_classlisting_layout');
				
				global $sigle_class_class;
				$sigle_class_class = edupress_column_class( 'edupress_classlisting_layout' );
				if( isset( $GLOBALS['wp_query']->queried_object->ID ) && intval( $GLOBALS['wp_query']->queried_object->ID ) > 0 ) 
				{
					$page_id  =  get_queried_object_id() ;	
					$base_template_name =  get_page_template_slug( $page_id ) ;
					
					if(  $base_template_name == 'kid-page-templates/tpl-classes-grid-2-col.php' ) 
					{
						$main_class = 'col-sm-8'; 
						$sigle_class_class = 'col-sm-6 with-sidebar two-column';
					}
					elseif(  $base_template_name == 'kid-page-templates/tpl-classes-grid-3-col.php' ) {
						/*
						$main_class = 'col-sm-9'; 
						$sigle_class_class = 'col-sm-4 with-sidebar three-column';
						*/
						$main_class = ''; 
						$sigle_class_class = 'col-sm-4 three-column';
					}
				}
				
				
				?>
               <main id="main" class="site-main col-xs-12 <?php echo esc_attr( $main_class );?>" >
                      
             <?php /* Start the Loop */ 
			 if ( have_posts() ) : 
			 ?>
            <div class="school-classes inner-classes">
				<?php 
                while ( have_posts() ) : the_post(); 
                    get_template_part('kid-template-parts/list-single', 'class'); 
                endwhile; ?>
			</div>

			<div class="clearfix"></div>
			<?php 
			if(function_exists('edupress_numeric_posts_nav')){
				edupress_numeric_posts_nav( 'navigation-pagination' ); 
			}?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
               
        </main><!-- #main -->
        <?php get_sidebar(); ?>
             </div> <!-- row -->
         </div> <!-- container -->
  </div><!-- #primary -->
</div> <!-- page-spacer #end  --> 	 

<?php get_footer(); ?>