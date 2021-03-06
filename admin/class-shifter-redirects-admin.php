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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Shifter_Redirects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Shifter_Redirects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/shifter-redirects-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Shifter_Redirects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Shifter_Redirects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

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

}
