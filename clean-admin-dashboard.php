<?php
/**
 * Plugin Name: Clean Admin Dashboard
 * Plugin URI: https://github.com/norcross/clean-admin-dashboard
 * Description: Remove all the things from the admin dashboard in one fell swoop.
 * Author: Andrew Norcross
 * Author URI: http://reaktivstudios.com/
 * Version: 0.0.1
 * Text Domain: clean-admin-dashboard
 * Domain Path: languages
 * License: MIT
 * GitHub Plugin URI: https://github.com/norcross/clean-admin-dashboard
 */

/**
 * Remove all dashboard widgets.
 *
 * @global $wp_meta_boxes
 */
add_action( 'wp_dashboard_setup', function () {
	global $wp_meta_boxes;

	// Clear out the dashboard meta boxes array.
	$wp_meta_boxes['dashboard'] = array();
}, 999 );

/**
 * Set up and load our class.
 */
class CleanAdminDash
{

	/**
	 * Load our hooks and filters.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_head',           array( $this, 'dashboard_css'       )           );
	}

	/**
	 * Load some bits of CSS to remove the remnants of the dashboard.
	 *
	 * @return void
	 */
	public function dashboard_css() {

		echo '<style type="text/css">' . "\n";
			echo '#dashboard-widgets-wrap .metabox-holder .postbox-container .empty-container { border: 0 none; }' . "\n";
			echo '#dashboard-widgets-wrap .metabox-holder .postbox-container .empty-container::after { content: ""; }' . "\n";
		echo '</style>';
	}

	// End the class.
}

// Instantiate our class.
$CleanAdminDash = new CleanAdminDash();
$CleanAdminDash->init();
