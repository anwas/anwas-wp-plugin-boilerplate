<?php
/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

namespace Plugin_Name;

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name or Your Company <email@example.com>
 */
class Plugin_Name_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        // Deactivation is NOT uninstall!
        if ( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }

	}

}
