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
 * Add some custom CSS to the admin dashboard to clean up the presentation.
 *
 * This will hide the "Drag Boxes Here" message, as there are no boxes to drag.
 */
add_action( 'admin_print_styles-index.php', function () {
?>

    <style type="text/css">
        #dashboard-widgets-wrap .empty-container { display: none; }
    </style>

<?php
} );
