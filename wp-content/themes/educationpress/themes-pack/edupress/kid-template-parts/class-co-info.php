<?php
global $edupress_options;
?>
 <?php if( isset( $GLOBALS['edupress_options']['edupress_classdetail_price']) && $GLOBALS['edupress_options']['edupress_classdetail_price'] && get_field('price') ): ?>
	<p class="co-price"><?php esc_html_e('Price: ','edupress');?><s></s><span><?php echo edupress_kid_format_currency( get_field('price'));?></span></p>
 <?php
 endif;
 ?>
 
<?php
if( isset($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_disp']) && $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_disp'] )
{
	$class = '';
	if( isset($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_disp']) && $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_disp'] && !empty($GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_type'] ) && $GLOBALS['edupress_options']['edupress_classdetail_enroll_btn_type'] == 'contact_form' ) {
		$class = ' fancybox';
		$link = '#inquiry-form';
	}
	else
	{
		$link = !empty($edupress_options['edupress_coursedetail_enroll_btn_text']) ? $edupress_options['edupress_coursedetail_enroll_btn_text']:'';	
	}
?>
<a href="<?php echo $link;?>" class="btn btn-medium btn-blue <?php echo esc_attr( $class );?>"><?php  echo !empty($edupress_options['edupress_coursedetail_enroll_btn_text']) ? $edupress_options['edupress_coursedetail_enroll_btn_text']:esc_html__('Inquiry Now', 'edupress');?></a>
<?php
}
?>
<!--
<p class="date">08 Sep, 2015 - 17 nov 2015</p>
-->
<ul>
	<?php
	$fields = get_field_objects();
	

	
	if( $fields )
	{
		foreach( $fields as $field_name => $field )
		{
			
			if( !empty( $field['value'] ) && $field_name != 'price' && apply_filters( 'edupress_universiry_render_acf_field', true, $field ) )
			{
		?>
  			<li>
            	<span><?php echo esc_html($field['label']);?> :</span> 
				<?php
					edupress_render_acf_field( $field );
				?>
           	</li>
     <?php
			}
		}
	}
	?>
</ul>
