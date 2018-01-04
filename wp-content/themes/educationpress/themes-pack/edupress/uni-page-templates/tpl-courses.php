<?php
/**
 * Template Name: Courses
 *
 * @package EduPress\Page-Templates
 * @author  ThemeCycle
 * @since   EduPress 1.0.0
 */
//This page template will be intenally call by archieve course and search cours also
get_header();

 
get_header(); 
global $edupress_options; 

function edupress_university_course_listing_title()
{
	if( is_search() )
	{ 
	?>
		<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'edupress' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php
	}
	elseif( is_archive() )
	{
		the_archive_title( '<h1 class="entry-title">', '</h1>' ); 
   
	}
	else
	{
    	the_title( '<h1 class="entry-title">', '</h1>' );
	}
}


if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='2') { ?>
<div class="breadcrumb-section">
	<div class="container">
    	<div class="row">
            <header class="entry-header">
            <?php edupress_university_course_listing_title(); ?>
            </header><!-- .entry-header -->
        </div> <!--row #end  -->
    </div>
</div>

<?php
}
?>
<!--
bredcumb here
-->
<?php
if( !is_search() ) {?>
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <p>
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html_e( 'Home', 'edupress' ); ?> ></a> <span><?php the_title(); ?></span>
                </p>
            </div>
        </div>
    </div>
<?php
}
?>


  
<div class="page-spacer clearfix">
	<div id="primary" class="content-area">
  		<div class="container">
        	<div class="row">   
            	<?php
            	if( !empty( $edupress_options['edupress_header_variation'] ) && $edupress_options['edupress_header_variation']=='1') { ?>
            	<header class="entry-header">
                        <?php edupress_university_course_listing_title(); ?>
             	 </header><!-- .entry-header -->         
                <?php 
				}
				
				
				if( $edupress_options['edupress_courselisting_search_box'] && $edupress_options['edupress_courselisting_search_box'] )
				{
					$title = esc_html__('Search Our New Courses', 'edupress' );
					$desc = esc_html__('Our courses are applied, innovative and rounded in the real world.', 'edupress' );
					$placeholder = esc_html__('search by keyword', 'edupress' );
					$cat_selection = $edupress_options['edupress_courselisting_search_box_with_cat'] && $edupress_options['edupress_courselisting_search_box_with_cat'] ? 'yes' : 'no';
					$button_text =  esc_html__('Search', 'edupress' );
					$def_search_text = is_search() ? get_search_query() : ''; 
					$def_cat = is_search() && !empty( $_GET['course-category'] ) ? intval($_GET['course-category']) : ''; 
					
					
					edupress_university_course_search_form( $title, $desc, $placeholder, $cat_selection, $button_text, $def_search_text, $def_cat );
				}
				
				if( is_search() )
				{ 
					$layout_name = 'edupress_searchcourse_layout';
				}
				else
				{
					$layout_name = 'edupress_courselisting_layout';
				}
				?>
           
			<main id="main" class="site-main col-xs-12  <?php echo esc_attr(edupress_page_layout( $layout_name ));?>"  >
            	<?php 
				if( is_archive() )
				{
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				}
				?>
                <div id="no-more-tables">
                    <table id="myTable">  
                        <thead>  
                          <tr>  
                            <th><?php esc_html_e('Course Name','edupress');?></th>  
                            <th><?php esc_html_e('Course Category','edupress');?></th>  
                            <th><?php esc_html_e('Starts','edupress');?></th>  
                            <th><?php esc_html_e('Length','edupress');?></th> 
                             <th><?php esc_html_e('Created','edupress');?></th>  
                          </tr>  
                        </thead>  
                      </table>
                </div>
        	</main><!-- #main -->
            
            


        <?php get_sidebar(); ?>
        </div>  <!-- #row -->
	</div><!-- #container -->
</div> <!-- primary #end -->
</div>

<?php
get_footer();