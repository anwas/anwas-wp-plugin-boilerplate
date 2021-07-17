<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin_area
 */

namespace Plugin_Name\Admin_Area;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin prefix, name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin_area
 * @author     Your Name or Your Company <email@example.com>
 */
class Plugin_Name_Admin {

	/**
	 * The unique prefix of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_prefix    The string used to uniquely prefix technical functions of this plugin.
	 */
	private string $plugin_prefix;

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private string $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private string $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_prefix     The unique prefix of this plugin.
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version           The version of this plugin.
	 */
	public function __construct( string $plugin_prefix, string $plugin_name, string $version ) {

		$this->plugin_prefix = $plugin_prefix;
		$this->plugin_name   = $plugin_name;
		$this->version       = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * Provided a single parameter, $hook_suffix, that informs the current admin page.
	 * This should be used to enqueue scripts and styles only in the pages they are going to be used,
	 * and avoid adding script and styles to all admin dashboard unnecessarily.
	 *
	 * @since    1.0.0
	 * @param    string $hook_suffix    The current admin page.
	 *
	 * @return void
	 */
	public function enqueue_styles( string $hook_suffix ): void {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * Provided a single parameter, $hook_suffix, that informs the current admin page.
	 * This should be used to enqueue scripts and styles only in the pages they are going to be used,
	 * and avoid adding script and styles to all admin dashboard unnecessarily.
	 *
	 * @since    1.0.0
	 * @param    string $hook_suffix    The current admin page.
	 *
	 * @return void
	 */
	public function enqueue_scripts( string $hook_suffix ): void {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

}
