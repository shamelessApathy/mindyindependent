<?php 
global $edupress_options, $sigle_class_class;
?>
<div class="col-xs-12 zoom <?php if(!empty($sigle_class_class)){ echo esc_attr($sigle_class_class) ;}?>">
     <div class="classes">
    <a href="<?php the_permalink();?>" class="img-thumb">
        <figure>
            <?php
            if( has_post_thumbnail() ):
                the_post_thumbnail( 'edupress-kid-class-thumbnail', array( 'alt' => the_title_attribute( array( 'echo' => false)), 'title' => the_title_attribute( array( 'echo' => false)), ) );
            else:			
            ?>
                <img src="<?php echo esc_url(get_template_directory_uri());?>/images/img-not-available.jpg" alt="<?php echo the_title_attribute( array( 'echo' => false));?>" width="360" height="270" title="<?php echo the_title_attribute( array( 'echo' => false));?>" />
             <?php
             endif;
             ?>
         </figure>
     </a>
    
      <div class="classes-info">
      <?php
	  if( is_search() )
	  	$price_flag_field = 'edupress_classsearch_price';
	  else
	  	$price_flag_field = 'edupress_classlisting_price';
	  
	  if( isset($GLOBALS['edupress_options'][$price_flag_field]) && $GLOBALS['edupress_options'][$price_flag_field]  &&  get_field('price') ): ?>
         <div class="price"><?php echo edupress_kid_format_currency( get_field('price'));?> <small></small></div>
         <?php
         endif;
      ?>
    <h3><a href="<?php the_permalink();?>">
        <?php 
        $title = ( mb_strlen( get_the_title( get_the_ID()) ) >= 65 ) ? mb_substr( get_the_title( get_the_ID()), 0, 65 ) . '...' : get_the_title( get_the_ID());
        echo esc_html($title);
        ?>
        </a>
     </h3>
     
    <p class="meta">
		<?php 
		if($edupress_options['edupress_classlisting_instructor']){
			$instructors_name_with_link = edupress_kid_get_instructors_name_with_link();
			esc_html_e( 'Taught by: ', 'edupress' );  echo $instructors_name_with_link; 
		}
		?>
		<?php if($edupress_options['edupress_classlisting_cat']){ 
		echo get_the_term_list( get_the_ID(), 'class-category', esc_html__( '. in: ', 'edupress'), ', ' ); } ?>	    </p>
     
    <p class="desc"><?php edupress_the_excerpt();?></p>
        <ul class="classes-time">
        <?php
		  if( is_search() )
			$year_old_flag_field = 'edupress_classsearch_year_old';
		  else
			$year_old_flag_field = 'edupress_classlisting_year_old';
		  
	 	if( isset($GLOBALS['edupress_options'][$year_old_flag_field]) && $GLOBALS['edupress_options'][$year_old_flag_field] && get_field('year_old') ): ?>
            <li>
                <span><?php the_field('year_old');?></span>
                Year old 
            </li>
            <?php endif; ?>
            <?php
		  if( is_search() )
			$class_size_flag_field = 'edupress_classsearch_class_size';
		  else
			$class_size_flag_field = 'edupress_classlisting_class_size';
		  
	 	if( isset($GLOBALS['edupress_options'][$class_size_flag_field]) && $GLOBALS['edupress_options'][$class_size_flag_field] &&  get_field('class_size') ): ?>
            <li>
                <span><?php the_field('class_size');?></span>
                Class Size
            </li>
            <?php endif; ?>
             <?php
		  if( is_search() )
			$class_duration_flag_field = 'edupress_classsearch_class_duration';
		  else
			$class_duration_flag_field = 'edupress_classlisting_class_duration';
		  
	 	if( isset($GLOBALS['edupress_options'][$class_duration_flag_field]) && $GLOBALS['edupress_options'][$class_duration_flag_field] &&  get_field('class_duration') ): ?>
            <li>
                <span><?php the_field('class_duration');?></span>
                Class Duration
             </li>
          <?php endif; ?>
        </ul>
    </div>
    </div>
 </div> <!-- col 1 #end -->