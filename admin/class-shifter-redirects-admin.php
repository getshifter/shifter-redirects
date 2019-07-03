<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://en.digitalcube.jp
 * @since      1.0.0
 *
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/admin
 * @author     DigitalCube <hello@getshifter.io>
 */
class Shifter_Redirects_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/shifter-redirects-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/shifter-redirects-admin.js', array( 'jquery' ), $this->version, false );

	}

		/**
		 * Create the options page
		 *
		 * @since    1.0.0
		 */
	public function shifter_redirects_admin() {
		include 'partials/shifter-redirects-admin-display.php';
	}

	/**
	 * Register plugin settings
	 *
	 * @since    1.0.0
	 */
	public function shifter_redirects_settings() {
		register_setting( 'shifter-redirects-settings-group', 'shifter_redirects_source' );
		register_setting( 'shifter-redirects-settings-group', 'shifter_redirects_destination' );
		register_setting( 'shifter-redirects-settings-group', 'shifter_redirects_status' );
	}

	/**
	 * Create the admin menu
	 *
	 * @since    1.0.0
	 */
	public function shifter_redirects_menu() {
		add_options_page(
			'Shifter Redirects',
			'Shifter Redirects',
			'manage_options',
			'shifter-redirects',
			array(
				$this,
				'shifter_redirects_admin',
			)
		);
	}

	/**
	 * Get the redirects
	 *
	 * @since    1.1.0
	 */
	public function get_redirects() {
		$request  = new WP_REST_Request( 'GET', '/redirection/v1' );
		$response = rest_do_request( $request );

		if ( $response->is_error() ) {
			$message    = $response->get_error_message();
			$error_data = $response->get_error_data();
			wp_die( esc_html( printf( '<p>An error occurred: %s (%d)</p>', $message, $error_data ) ) );
		}

			$data = $response->get_data();
			return $data;
	}

	/**
	 * Save redirects to file
	 *
	 * @since    1.1.0
	 */
	public function save_redirects() {

		$upload_dir = wp_get_upload_dir();
		$file       = $upload_dir['basedir'] . '/shifter-redirects.json';
		$dirname    = dirname( $save_path );
		$data       = self::get_redirects();
		$data_json  = wp_json_encode( $data );

		if ( ! is_dir( $dirname ) ) {
			mkdir( $dirname, 0755, true );
		}

		file_put_contents( $file, $data_json );

	}

}
