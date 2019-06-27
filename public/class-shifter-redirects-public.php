<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://en.digitalcube.jp
 * @since      1.0.0
 *
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/public
 * @author     DigitalCube <hello@getshifter.io>
 */
class Shifter_Redirects_Public {


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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/shifter-redirects-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		$data = array(
			'shifter_redirects_source'      => get_option( 'shifter_redirects_source' ),
			'shifter_redirects_destination' => get_option( 'shifter_redirects_destination' ),
		);

		$shifter_redirects = array(
			'data' => $data,
		);

		wp_register_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/shifter-redirects-public.js',
			array( 'jquery' ),
			$this->version,
			true
		);

		wp_localize_script( $this->plugin_name, 'shifterRedirects', $shifter_redirects );
		wp_enqueue_script( $this->plugin_name );

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
	 * Create the options page
	 *
	 * @since    1.0.0
	 */
	public function shifter_redirects_admin() {
		?>
	<div class="wrap">
<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<div class="card">
	<h2 class="title">Shifter Redirects</h2>
  <p>Domain redirects for static sites.</p>
  <form method="post" action="options.php">
		<?php settings_fields( 'shifter-redirects-settings-group' ); ?>
		<?php do_settings_sections( 'shifter-redirects-settings-group' ); ?>
	  <table class="form-table">
		<tr valign="top">
		 <th scope="row">
			 Enabled:
		 </th>
		 <td>
		 <input name="shifter_redirects_status" type="checkbox" value="1" <?php checked( '1', get_option( 'shifter_redirects_status' ) ); ?> />
		 </td>
		</tr>
		<tr valign="top">
		<th scope="row">Source:</th>
		<td>
		  <input placeholder="https://www.example.com" name="shifter_redirects_source" type="url" aria-describedby="shifter-redirects-source" value="<?php echo get_option( 'shifter_redirects_source' ); ?>" class="regular-text code">
		</td>
		</tr>
		<tr>
		<th scope="row">Destination:</th>
		<td>
		  <input placeholder="https://example.com" name="shifter_redirects_destination" type="url" aria-describedby="shifter-redirects-destination" value="<?php echo get_option( 'shifter_redirects_destination' ); ?>" class="regular-text code">
		</td>
		</tr>
	  </table>
		<?php submit_button(); ?>
  </form>
</div>
<h2>Created by <a style="color:#bc4e9c;" href="https://getshifter.io" target="_blank">Shifter</a></h2>
</div>
		
		<?php
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
		 * Add Shifter Redirects JS functions to the header
		 *
		 * @since    1.0.0
		 * @access   private
		 */
	public function shifter_redirects_header() {
		?>
				<script type='text/javascript'>
				const source = "<?php echo __( get_option( 'shifter_redirects_source' ) ); ?>";
				const destination = "<?php echo __( get_option( 'shifter_redirects_destination' ) ); ?>";
				const status = "<?php echo __( get_option( 'shifter_redirects_status' ) ); ?>";
				const host = window.location.origin;

				if (destination && source) {
					if (host === source) {
						window.location = destination + window.location.pathname + window.location.search;
					}
				}
				</script>
			<?php
	}
}
