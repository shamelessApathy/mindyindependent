<?php
/*
 * Search Form For Home Page Three
 */
global $educationpress_options;
?>
<section class="search-form ">
   		<div class="container">
        	<div class="row">
          <?php if ( $educationpress_options[ 'educationpress_home_three_searchform' ] ) {
              if ( ! empty( $educationpress_options['educationpress_home_three_searchform_title'] ) ) {?>
        		<h2 class="text-center"><?php echo esc_html( $educationpress_options['educationpress_home_three_searchform_title'] ); ?></h2>
        	  <?php } }?>
             
             <div class="home-third-search center-block">
              <?php if ( $educationpress_options[ 'educationpress_home_three_searchform' ] ) {?>
            <form action="<?php echo esc_url(home_url( '/' )); ?>" method="get" class="form-inline">
                <fieldset>
                    <div class="input-group">
                        <input type="text" name="s" id="search" placeholder="<?php esc_html_e("What do you want to learn today?",'educationpress'); ?>" value="<?php the_search_query(); ?>" class="form-control" />
                         <input type="hidden" value="course" name="post-type" id="post_type" />
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-orange btn-medium"><i class="lnr lnr-magnifier"></i><?php esc_html_e("Search",'educationpress'); ?></button>
                        </span>
                    </div>
                </fieldset>
            </form><!-- #search-form #end  -->
             <?php }?>
            <?php if ( $educationpress_options[ 'educationpress_home_three_searchform_icons' ] ) {?>
            <div class="courses-count center-block">
            	 <?php 
				 if ( ! empty( $educationpress_options['educationpress_home_three_searchform_icontext1'] ) ) {?>
                <div class="col-sm-7 col-md-4 wow bounceInLeft">
                <h3>
                <i class="<?php echo esc_attr( $educationpress_options['educationpress_home_three_searchform_icon1'] ); ?>"></i>
                 <?php echo esc_html( $educationpress_options['educationpress_home_three_searchform_icontext1'] ); ?>
                 </h3>
                  </div>
                <?php }?>
               
                <?php 
				 if ( ! empty( $educationpress_options['educationpress_home_three_searchform_icontext2'] ) ) {?>
				<div class="col-sm-7 col-md-4 wow bounceInDown">
                <h3>
                <i class="<?php echo esc_attr( $educationpress_options['educationpress_home_three_searchform_icon2'] ); ?>"></i>
				<?php echo esc_html( $educationpress_options['educationpress_home_three_searchform_icontext2'] ); ?>
                </h3>
                </div>
               <?php }?> 
                
                <?php 
				 if ( ! empty( $educationpress_options['educationpress_home_three_searchform_icontext3'] ) ) {?>
				<div class="col-sm-7 col-md-4 wow bounceInUp">
                <h3>
                <i class="<?php echo esc_attr( $educationpress_options['educationpress_home_three_searchform_icon3'] ); ?>"></i>
				<?php echo esc_html( $educationpress_options['educationpress_home_three_searchform_icontext3'] ); ?>
                </h3></div>
                 <?php }?>
                
            </div>
             <?php }?>
            </div> <!-- home-third-search -->
            
            </div>  <!--row #end--> 
 		</div><!-- #container #end -->
       </section>