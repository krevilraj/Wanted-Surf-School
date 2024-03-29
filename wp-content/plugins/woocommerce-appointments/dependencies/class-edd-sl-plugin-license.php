<?php
/**
 * License handler for BookingWP plugins
 *
 * This class should simplify the process of adding license information
 * to new BookingWP plugins.
 *
 * @version 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'EDD_SL_Plugin_License' ) ) :

/**
 * EDD_SL_Plugin_License Class
 */
class EDD_SL_Plugin_License {

	private $options;
	private $file;
	private $license;
	private $item_name;
	private $item_shortname;
	private $version;
	private $author  = 'BookingWP';
	private $api_url = 'https://bookingwp.com/';

	/**
	 * Class constructor
	 *
	 * @global  array $bizz_options
	 * @param string  $_file
	 * @param string  $_item_name
	 * @param string  $_version
	 * @param string  $_author
	 * @param string  $_api_url
	 */
	public function __construct( $_file, $_item_name, $_version, $_author, $_api_url = null ) {
		$this->options        = get_option( 'bizz_licenses_settings' );
		$this->file           = $_file;
		$this->item_name      = $_item_name;
		$this->item_shortname = 'bizz_' . preg_replace( '/[^a-zA-Z0-9_\s]/', '', str_replace( ' ', '_', strtolower( $this->item_name ) ) );
		$this->version        = $_version;
		$this->license        = isset( $this->options[ $this->item_shortname . '_license_key' ] ) ? trim( $this->options[ $this->item_shortname . '_license_key' ] ) : '';
		$this->author         = is_null( $_author ) ? $this->author : $_author;
		$this->api_url        = is_null( $_api_url ) ? $this->api_url : $_api_url;

		// Setup hooks
		$this->hooks();
	}

	/**
	 * Setup hooks
	 *
	 * @access  private
	 * @return  void
	 */
	private function hooks() {

		add_action( 'admin_init', array( $this, 'includes' ) );

		// Add license notice
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );

		// Register settings
		add_filter( 'bizz_licenses_settings_keys', array( $this, 'settings' ) );

		// Activate license key on settings save
		add_action( 'admin_init', array( $this, 'activate_license' ) );

		// Deactivate license key
		add_action( 'admin_init', array( $this, 'deactivate_license' ) );

		// Updater
		add_action( 'admin_init', array( $this, 'auto_updater' ) );

	}

	/**
	 * Include the updater class
	 *
	 * @access  private
	 * @return  void
	 */
	public function includes() {
		if ( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
			require_once 'class-edd-sl-plugin-updater.php';
		}
	}

	/**
	 * Admin notices
	 *
	 * @access  private
	 * @global  array $bizz_options
	 * @return  void
	 */
	public function admin_notices() {
		if ( apply_filters( 'woocommerce_helper_suppress_admin_notices', false ) ) {
			return;
		}

		// Get current screen.
		$screen    = function_exists( 'get_current_screen' ) ? get_current_screen() : '';
		$screen_id = $screen ? $screen->id : '';

		// Open error notice when WooCommerce is not active.
		if ( ! is_woocommerce_active() && 'update' !== $screen_id ) {

			if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) && ! is_plugin_active( 'woocommerce/woocommerce.php' ) && current_user_can( 'activate_plugin', 'woocommerce/woocommerce.php' ) ) {
				/* translators: %1$s: WooCommerce activation URL */
				$notice = sprintf(
					/* translators: %1$s: WC Appointments, %2$s: License activation URL */
					'WooCommerce plugin is required for Appointments to work properly. &nbsp; <a href="%1$s" class="button button-primary">Activate WooCommerce</a>',
					esc_url(
						wp_nonce_url(
							self_admin_url( 'plugins.php?action=activate&plugin=woocommerce/woocommerce.php&plugin_status=active' ),
							'activate-plugin_woocommerce/woocommerce.php'
						)
					)
				);
			} else {
				if ( current_user_can( 'install_plugins' ) ) {
					$url = esc_url(
						wp_nonce_url(
							self_admin_url( 'update.php?action=install-plugin&plugin=woocommerce' ),
							'install-plugin_woocommerce'
						)
					);
				} else {
					$url = esc_url( 'https://wordpress.org/plugins/woocommerce/' );
				}
				/* translators: %1$s: WooCommerce activation URL */
				$notice = sprintf(
					/* translators: %1$s: WC Appointments, %2$s: License activation URL */
					'WooCommerce plugin is required for Appointments to work properly. &nbsp; <a href="%1$s" class="button button-primary">Install WooCommerce</a>',
					$url
				);
			}
			echo '<div class="error woocommerce-message"><p>' . $notice . '</p></div>'; // WPCS: XSS ok.

			return;
		}

		// Open error notice if license is not valid
		if ( 'valid' !== get_option( $this->item_shortname . '_license_active' ) ) {
			$screens   = function_exists( 'wc_get_screen_ids' ) ? wc_get_screen_ids() : [];
			$screens[] = 'plugins';

			if ( in_array( $screen_id, $screens, true ) ) {

				/* translators: %s: helper screen url */
				$notice = sprintf(
					/* translators: %1$s: WC Appointments, %2$s: License activation URL */
					'License for %1$s plugin is not active. <a href=" %2$s">Activate it here</a>.',
					$this->item_name,
					admin_url( 'index.php?page=bookingwp-license' )
				);
				echo '<div class="updated woocommerce-message"><p>' . $notice . '</p></div>'; // WPCS: XSS ok.

			}
		}
	}

	/**
	 * Add license field to settings
	 *
	 * @access  public
	 * @param array   $settings
	 * @return  array
	 */
	public function settings( $settings = [] ) {
		global $bizz_license_settings;

		$bizz_license_settings = array(
			array(
				'id'      => $this->item_shortname . '_license_key',
				'name'    => sprintf( '%1$s', $this->item_name ),
				'desc'    => '',
				'type'    => 'license_key',
				'options' => array( 'is_valid_license_option' => $this->item_shortname . '_license_active' ),
				'size'    => 'regular',
			),
		);

		return array_merge( $settings, $bizz_license_settings );
	}

	/**
	 * Activate the license key
	 *
	 * @access  public
	 * @return  void
	 */
	public function activate_license() {
		if ( ! isset( $_POST['bizz_licenses_settings'][ $this->item_shortname . '_license_key' ] ) ) {
			return;
		}

		foreach ( $_POST as $key => $value ) {
			if ( false !== strpos( $key, 'license_key_deactivate' ) ) {
				// Don't activate a key when deactivating a different key
				return;
			}
		}

		/*
		if ( 'valid' == get_option( $this->item_shortname . '_license_active' ) ) {
			return;
		}
		*/

		$license = sanitize_text_field( $_POST['bizz_licenses_settings'][ $this->item_shortname . '_license_key' ] );

		// Data to send to the API
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url(),
		);

		// Call the API
		$response = wp_remote_post(
			$this->api_url,
			array(
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $api_params,
			)
		);
		#echo '<pre>'; print_R( $response ); echo '</pre>'; exit;

		// Make sure there are no errors
		if ( is_wp_error( $response ) ) {
			return;
		}

		// Tell WordPress to look for updates
		set_site_transient( 'update_plugins', new stdClass );

		// Decode license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		#error_log( var_export( $license_data, true ) );

		update_option( $this->item_shortname . '_license_active', $license_data->license );
	}

	/**
	 * Deactivate the license key
	 *
	 * @access  public
	 * @return  void
	 */
	public function deactivate_license() {
		// Run on deactivate button press
		if ( isset( $_POST[ $this->item_shortname . '_license_key_deactivate' ] ) ) {

			// Data to send to the API
			$api_params = array(
				'edd_action' => 'deactivate_license',
				'license'    => $this->license,
				'item_name'  => urlencode( $this->item_name ),
				'url'        => home_url(),
			);

			// Call the API
			$response = wp_remote_post(
				$this->api_url,
				array(
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				)
			);

			#echo '<pre>'; print_R( $response ); echo '</pre>'; exit;

			// Make sure there are no errors
			if ( is_wp_error( $response ) ) {
				return;
			}

			// Decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			$bizz_options = get_option( 'bizz_licenses_settings' );

			#error_log( var_export( $license_data, true ) );

			// $license_data->license will be either "deactivated" or "failed"
			if ( 'deactivated' == $license_data->license ) {
				// Delete license key.
				/*
				$bizz_options = get_option( 'bizz_licenses_settings' );
				if ( isset( $bizz_options[ $this->item_shortname . '_license_key' ] ) ) {
					unset( $bizz_options[ $this->item_shortname . '_license_key' ] );
					update_option( 'bizz_licenses_settings', $bizz_options );
				}
				*/
				// Invalidate.
				delete_option( $this->item_shortname . '_license_active' );
			}
		}
	}

	/**
	 * Auto updater
	 *
	 * @access  private
	 * @global  array $bizz_options
	 * @return  void
	 */
	public function auto_updater() {
		// Setup the updater
		$bizz_updater = new EDD_SL_Plugin_Updater(
			$this->api_url,
			$this->file,
			array(
				'version'   => $this->version,
				'license'   => $this->license,
				'item_name' => $this->item_name,
				'author'    => $this->author,
			)
		);
	}

}

endif; // end class_exists check



/**
 * Functions for License settings
 *
 * These functions will create plugin license admin page and
 * handle all license options
 *
 * @version 1.0.0
 */

add_action( 'admin_menu', 'bizz_licenses_options_link' );
/**
 * Creates the admin submenu pages under the Downloads menu and assigns their
 * links to global variables
 *
 * @since 1.0.0
 * @global $bizz_licenses_settings_page
 * @return void
 */
if ( ! function_exists( 'bizz_licenses_options_link' ) ) :

function bizz_licenses_options_link() {
	global $bizz_licenses_settings_page;
	$bizz_licenses_settings_page = add_submenu_page( 'index.php', 'BookingWP License Keys', 'BookingWP Keys', 'manage_options', 'bookingwp-license', 'bizz_licenses_options_page' );
}

endif; // end function_exists check

/**
 * Options Page
 *
 * Renders the options page contents.
 *
 * @since 1.0.0
 * @global $bizz_options Array of all the EDD Options
 * @return void
 */
if ( ! function_exists( 'bizz_licenses_options_page' ) ) :

function bizz_licenses_options_page() {
	ob_start();
	?>
	<div class="wrap">
		<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
		<form method="post" action="options.php">
			<table class="form-table">
			<?php
			settings_fields( 'bizz_licenses_settings' );
			do_settings_fields( 'bizz_licenses_settings_keys', 'bizz_licenses_settings_keys' );
			?>
			</table>
			<?php submit_button(); ?>
		</form>
	</div><!-- .wrap -->
	<?php
	echo ob_get_clean();
}

endif; // end function_exists check

add_action( 'admin_init', 'bizz_licenses_settings_register' );
/**
 * Add all settings sections and fields
 *
 * @since 1.0.0
 * @return void
*/
if ( ! function_exists( 'bizz_licenses_settings_register' ) ) :

function bizz_licenses_settings_register() {

	if ( false == get_option( 'bizz_licenses_settings' ) ) {
		add_option( 'bizz_licenses_settings' );
	}

	add_settings_section(
		'bizz_licenses_settings_keys',
		__return_null(),
		'__return_false',
		'bizz_licenses_settings_keys'
	);

	$bizz_licenses_settings = array(
		'licenses' => apply_filters(
			'bizz_licenses_settings_keys',
			[]
		),
	);

	foreach ( $bizz_licenses_settings['licenses'] as $key => $option ) {

		$name = isset( $option['name'] ) ? $option['name'] : '';

		add_settings_field(
			'bizz_licenses_settings[' . $option['id'] . ']',
			$name,
			'bizz_' . $option['type'] . '_callback',
			'bizz_licenses_settings_keys',
			'bizz_licenses_settings_keys',
			array(
				'section' => 'licenses',
				'id'      => isset( $option['id'] ) ? $option['id'] : null,
				'desc'    => ! empty( $option['desc'] ) ? $option['desc'] : '',
				'name'    => isset( $option['name'] ) ? $option['name'] : null,
				'size'    => isset( $option['size'] ) ? $option['size'] : null,
				'options' => isset( $option['options'] ) ? $option['options'] : '',
				'std'     => isset( $option['std'] ) ? $option['std'] : '',
				'min'     => isset( $option['min'] ) ? $option['min'] : null,
				'max'     => isset( $option['max'] ) ? $option['max'] : null,
				'step'    => isset( $option['step'] ) ? $option['step'] : null,
			)
		);
	}

	// Creates our settings in the options table
	register_setting( 'bizz_licenses_settings', 'bizz_licenses_settings', 'bizz_licenses_settings_sanitize' );

}

endif; // end function_exists check


/**
 * Registers the license field callback for Software Licensing
 *
 * @since 1.0.0
 * @param array $args Arguments passed by the setting
 * @global $bizz_options Array of all the EDD Options
 * @return void
 */
if ( ! function_exists( 'bizz_license_key_callback' ) ) :

function bizz_license_key_callback( $args ) {
	$bizz_options = get_option( 'bizz_licenses_settings' );

	if ( isset( $bizz_options[ $args['id'] ] ) ) {
		$value = $bizz_options[ $args['id'] ];
	} else {
		$value = isset( $args['std'] ) ? $args['std'] : '';
	}

	$size = ( isset( $args['size'] ) && ! is_null( $args['size'] ) ) ? $args['size'] : 'regular';
	$html = '<input type="text" class="' . $size . '-text" id="bizz_licenses_settings[' . $args['id'] . ']" name="bizz_licenses_settings[' . $args['id'] . ']" value="' . esc_attr( $value ) . '"/>';

	if ( 'valid' == get_option( $args['options']['is_valid_license_option'] ) ) {
		$html .= '<input type="submit" class="button-secondary" name="' . $args['id'] . '_deactivate" value="Deactivate License"/>';
	}

	$html .= '<label for="bizz_licenses_settings[' . $args['id'] . ']">' . $args['desc'] . '</label>';

	echo $html;
}

endif; // end function_exists check

/**
 * Settings Sanitization
 *
 * Adds a settings error (for the updated message)
 * At some point this will validate input
 *
 * @since 1.0.0
 *
 * @param array $input The value inputted in the field
 *
 * @return string $input Sanitizied value
 */
if ( ! function_exists( 'bizz_licenses_settings_sanitize' ) ) :

function bizz_licenses_settings_sanitize( $input = [] ) {
	if ( empty( $_POST['_wp_http_referer'] ) ) {
		return $input;
	}

	parse_str( $_POST['_wp_http_referer'], $referrer );

	$input = $input ? $input : [];

	// Loop through each setting being saved and pass it through a sanitization filter
	foreach ( $input as $key => $value ) {

		// General filter
		$input[$key] = apply_filters( 'bizz_settings_sanitize', $input[$key], $key );
	}

	// Merge our new settings with the existing
	$output = $input;

	add_settings_error( 'bizz-notices', '', 'License keys updated.', 'updated' );

	return $output;
}

endif; // end function_exists check

add_action( 'admin_notices', 'bizz_licenses_admin_messages' );
/**
 * Admin Messages
 *
 * @since 1.0.0
 * @global $edd_options Array of all the EDD Options
 * @return void
 */
if ( ! function_exists( 'bizz_licenses_admin_messages' ) ) :

function bizz_licenses_admin_messages() {
	settings_errors( 'bizz-notices' );
}

endif; // end function_exists check
