<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

namespace Plugin_Name;

use \Plugin_Name\PLUGIN_DIR;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name {

	/**
	 * The unique prefix of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_prefix    The string used to uniquely prefix technical functions of this plugin.
	 */
	protected string $plugin_prefix;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected string $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	private static string $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin prefix, name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		
		self::$version = self::get_version();

		$this->plugin_name = 'plugin-name';

		if ( defined( '\Plugin_Name\PLUGIN_PREFIX' ) ) {
			$this->plugin_prefix = \Plugin_Name\PLUGIN_PREFIX;
		} else {
			$this->plugin_prefix = 'plugin_name';
		}

		// Manualy load only if not using autoloader.
		$this->load_dependencies();

	}

	/**
	 * Load the required dependencies for this plugin only if not using autoloader.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - \Plugin_Name\Plugin_Name_i18n. Defines internationalization functionality.
	 * - \Plugin_Name\Admin_Area\Plugin_Name_Admin. Defines all hooks for the admin area.
	 * - \Plugin_Name\Public_Area\Plugin_Name_Public. Defines all hooks for the public side of the site.
	 * - \Plugin_Name\Public_Area\Plugin_Name_Shortcodes. Defines all hooks for the registration of the shortcodes.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once PLUGIN_DIR . 'includes/plugin-name-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once PLUGIN_DIR . 'admin-area/plugin-name-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once PLUGIN_DIR . 'public-area/plugin-name-public.php';

		/**
		 * The class responsible for defining all registration and functionality of the shortcodes.
		 */
		require_once PLUGIN_DIR . 'public-area/plugin-name-shortcodes.php';

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new \Plugin_Name\Plugin_Name_i18n();

		add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ) );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new \Plugin_Name\Admin_Area\Plugin_Name_Admin( $this->get_plugin_prefix(), $this->get_plugin_name() );

		add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_scripts' ) );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new \Plugin_Name\Public_Area\Plugin_Name_Public( $this->get_plugin_prefix(), $this->get_plugin_name() );

		add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ) );

		// When adding `add_shortcode()` function in a plugin,
		// it’s good to add it in a function that is hooked to `init` hook.
		// So that WordPress has time to initialize properly.
		add_action( 'init', array( $this, 'add_shortcodes' ) );

	}

	/**
	 * Register all of the shortcodes.
	 *
	 * Make sure that the shortcode have been registered before attempting to remove.
	 * Specify a higher priority number for add_action() or hook into an action hook that is run later.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function add_shortcodes() {

		$plugin_shortcodes = new \Plugin_Name\Public_Area\Plugin_Name_Shortcodes( $this->get_plugin_prefix(), $this->get_plugin_name() );

		add_shortcode( $this->get_plugin_prefix() . '_shortcode', array( $plugin_shortcodes, 'shortcode_func' ) );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * The unique prefix of the plugin used to uniquely prefix technical functions.
	 *
	 * @since     1.0.0
	 * @return    string    The prefix of the plugin.
	 */
	public function get_plugin_prefix() {
		return $this->plugin_prefix;
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Get the version number of the asset file.
	 *
	 * @param string $full_path Visas kelias iki failo.
	 *
	 * @since     1.0.0
	 * @return    string    Full path to the asset file.
	 */
	public static function get_asset_version( string $full_path ): string {
		if ( ! defined( '\WP_DEBUG' ) || false === \WP_DEBUG ) {
			return self::get_version();
		}

		if ( ! \file_exists( $full_path ) ) {
			return '';
		}

		return \filemtime( $full_path );
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public static function get_version(): string {
		if ( ! isset( self::$version ) || empty( self::$version ) ) {
			self::set_version();
		}

		return self::$version;
	}

	/**
	 *  Set the version number of the plugin.
	 *
	 * @since     1.0.0
	 */
	private static function set_version() {
		if ( defined( '\Plugin_Name\PLUGIN_VERSION' ) ) {
			self::$version = \Plugin_Name\PLUGIN_VERSION;
		} else {
			self::$version = '1.0.0';
		}
	}

}
