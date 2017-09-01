<?php
/**
 * Library for activating dependent plugins
 *
 * @package    TGM-Plugin-Activation
 * @author     Thomas Griffin <thomasgriffinmedia.com> and Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'pencil_register_required_plugins' );
/**
 * Registering the required plugins for this theme.
 */
function pencil_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// WordPress Popular Posts from WordPress Plugin Repository.
		array(
			'name'      => 'WordPress Popular Posts',
			'slug'      => 'wordpress-popular-posts',
			'required'  => false,
		),

		// Shareaholic from WordPress Plugin Repository.
		array(
			'name'      => 'Shareaholic | share buttons, related posts, social analytics & more',
			'slug'      => 'shareaholic',
			'required'  => false,
		),

		// User Social Profiles from WordPress Plugin Repository.
		array(
			'name'      => 'User Social Profiles',
			'slug'      => 'user-social-profiles',
			'required'  => false,
		),
	);
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
