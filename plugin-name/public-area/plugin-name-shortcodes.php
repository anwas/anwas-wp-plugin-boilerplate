<?php
/**
 * The shortcodes functionality of the plugin.
 *
 * @link       http://example.com/
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public_area
 */

namespace Plugin_Name\Public_Area;

/**
 * The shortcodes functionality of the plugin.
 *
 * Defines the plugin prefix, name, version, and example hooks for how to
 * create shortcode.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public_area
 * @author     Your Name or Your Company <email@example.com>
 */
class Plugin_Name_Shortcodes {

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
	 * @param      string $version           The version of this plugin.
	 */
	public function __construct( string $plugin_prefix, string $plugin_name, string $version ) {

		$this->plugin_prefix = $plugin_prefix;
		$this->plugin_name   = $plugin_name;
		$this->version       = $version;

	}

	/**
	 * Example Shortcode processing function.
	 *
	 * Shortcode can take attributes like [plugin_name_prefix_shortcode attribute='123'] .
	 * Shortcode attribute names are always converted to lowercase
	 * before they are passed into the handler function. Values are untouched.
	 *
	 * @link https://codex.wordpress.org/Shortcode_API
	 *
	 * @since    1.0.0
	 * @param    string|array $atts       An associative array of attributes, or an empty string if no attributes are given.
	 * @param    string       $content    The shortcode content (if any).
	 * @param    string       $tag        The name of the shortcode, useful for shared callback functions.
	 *
	 * @return string
	 */
	public function shortcode_func( string|array $atts, ?string $content = null, string $tag ): string { // phpcs:ignore Generic.PHP.Syntax.PHPSyntax

		$a = shortcode_atts(
			array(
				'attribute' => '0',
			),
			$atts,
			$this->plugin_prefix . '_shortcode'
		);

		// If the shortcode produces a lot of HTML then ob_start can be used to capture output and convert it to a string.
		ob_start();

		if ( is_null( $content ) ) {
			$content = '';
		}

		// Echo our output.
		echo esc_html( $a['attribute'] ) . "\n" . do_shortcode( wp_kses_post( apply_filters( 'the_content', $content ) ) );

		// Shortcodes are filters and should always return, never echo.
		return ob_get_clean();

	}

}
