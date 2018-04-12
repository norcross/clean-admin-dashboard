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
		add_action( 'wp_dashboard_setup',   array( $this, 'dashboard_widgets'   ),  999     );
		add_action( 'admin_head',           array( $this, 'dashboard_css'       )           );
	}

	/**
	 * Remove all the dashboard widgets
	 *
	 * @return null
	 */
	public function dashboard_widgets() {

		// Call the global $wp_meta_boxes.
		global $wp_meta_boxes;

		// Bail if we have no dashboard items to remove.
		if ( empty( $wp_meta_boxes['dashboard'] ) ) {
			return;
		}

		// Remove all default normal items.
		if ( isset( $wp_meta_boxes['dashboard']['normal'] ) ) {
			unset( $wp_meta_boxes['dashboard']['normal'] );
		}

		// Remove all default side items.
		if ( isset( $wp_meta_boxes['dashboard']['side'] ) ) {
			unset( $wp_meta_boxes['dashboard']['side'] );
		}
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
