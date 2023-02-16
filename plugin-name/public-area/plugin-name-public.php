<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public_area
 */

namespace Plugin_Name\Public_Area;

use const \Plugin_Name\PLUGIN_DIR;
use const \Plugin_Name\PLUGIN_URI;

use \Plugin_Name\Plugin_Name; // The main class of the plugin.

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin prefix, name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public_area
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 */
	public function __construct( string $plugin_prefix, string $plugin_name ) {

		$this->plugin_prefix = $plugin_prefix;
		$this->plugin_name   = $plugin_name;
		$this->version       = Plugin_Name::get_version();

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {

		/*
		 * This function is provided for demonstration purposes only.
		 */

		wp_enqueue_style(
			$this->plugin_name,
			PLUGIN_URI . 'public-area/assets/css/plugin-name-public.css',
			array(),
			Plugin_Name::get_asset_version( PLUGIN_DIR . 'public-area/assets/css/plugin-name-public.css' ),
			'all'
		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {

		/*
		 * This function is provided for demonstration purposes only.
		 */

		wp_register_script(
			$this->plugin_name . '-manifest',
			PLUGIN_URI . 'public-area/assets/js/manifest.js',
			array(),
			Plugin_Name::get_asset_version( PLUGIN_DIR . 'public-area/assets/js/manifest.js' ),
			true
		);

		wp_register_script(
			$this->plugin_name . '-vendor',
			PLUGIN_URI . 'public-area/assets/js/plugin-name-public-vendor.js',
			array(
				$this->plugin_name . '-manifest',
			),
			Plugin_Name::get_asset_version( PLUGIN_DIR . 'public-area/assets/js/plugin-name-public-vendor.js' ),
			true
		);

		wp_enqueue_script(
			$this->plugin_name,
			PLUGIN_URI . 'public-area/assets/js/plugin-name-public.js',
			array(
				$this->plugin_name . '-manifest',
				$this->plugin_name . '-vendor',
				'jquery',
			),
			Plugin_Name::get_asset_version( PLUGIN_DIR . 'public-area/assets/js/plugin-name-public.js' ),
			true
		);

	}

}
