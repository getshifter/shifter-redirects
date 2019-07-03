<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://en.digitalcube.jp
 * @since      1.0.0
 *
 * @package    Shifter_Redirects
 * @subpackage Shifter_Redirects/admin/partials
 */

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
					<th scope="row">Enabled:</th>
					<td>
						<input name="shifter_redirects_status" type="checkbox" value="1" <?php checked( '1', get_option( 'shifter_redirects_status' ) ); ?> />
					</td>
			</tr>
			<tr valign="top">
			<th scope="row">Source:</th>
				<td>
					<input placeholder="https://www.example.com" name="shifter_redirects_source" type="url" aria-describedby="shifter-redirects-source" value="<?php echo esc_attr( get_option( 'shifter_redirects_source' ) ); ?>" class="regular-text code">
				</td>
			</tr>
			<tr>
				<th scope="row">Destination:</th>
				<td>
					<input placeholder="https://example.com" name="shifter_redirects_destination" type="url" aria-describedby="shifter-redirects-destination" value="<?php echo esc_attr( get_option( 'shifter_redirects_destination' ) ); ?>" class="regular-text code">
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>
<h2>Created by <a style="color:#bc4e9c;" href="https://getshifter.io" target="_blank">Shifter</a></h2>
</div>
