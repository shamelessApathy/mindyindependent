<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme EduPress for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
add_filter( 'edupress_required_plugins', 'edupress_university_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function edupress_university_register_required_plugins( $parent_plugins ) {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	 
	$child_plugins = array(
		// EduPress University  Extension plugin is required for import demo data	
		/*
		array(
            'name'      => 'EduPress University Extension',
            'slug'      => 'edupress-uni-extension', 
            'source'    => get_template_directory() . '/inc/plugins/uni/edupress-uni-extension.zip', 
            'required'  => true, 
			'force_activation'   => false,
            'force_deactivation' => false,
        ),
		*/
	);

	
	if( is_array($child_plugins) && !empty($child_plugins) )
	{
		$plugins = array_merge( $parent_plugins, $child_plugins);
		return $plugins;
	}
	else
	{
		return $parent_plugins;	
	}
}