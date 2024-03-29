<?php
/**
 * The Template for displaying radio button field.
 *
 * @version 3.0.0
 */

foreach ( $addon['options'] as $i => $option ) {
	$option_price         = ! empty( $option['price'] ) ? $option['price'] : '';
	$option_price_type    = ! empty( $option['price_type'] ) ? $option['price_type'] : '';
	$price_prefix         = 0 < $option_price ? '+' : '';
	$price_type           = $option_price_type;
	$price_raw            = apply_filters( 'woocommerce_product_addons_option_price_raw', $option_price, $option );
	$option_duration      = ! empty( $option['duration'] ) ? $option['duration'] : '';
	$option_duration_type = ! empty( $option['duration_type'] ) ? $option['duration_type'] : '';
	$duration_type        = $option_duration_type;
	$duration_raw         = apply_filters( 'woocommerce_product_addons_option_duration_raw', $option_duration, $option );
	$field_name           = ! empty( $addon['field_name'] ) ? $addon['field_name'] : '';
	$option_label         = ( '0' === $option['label'] ) || ! empty( $option['label'] ) ? $option['label'] : '';
	$price_display        = WC_Product_Addons_Helper::get_product_addon_price_for_display( $price_raw );

	if ( 'percentage_based' === $price_type ) {
		$price_display     = $price_raw;
		$price_for_display = apply_filters(
			'woocommerce_product_addons_option_price',
			$price_raw ? '(' . $price_prefix . $price_raw . '%)' : '',
			$option,
			$i,
			$addon,
			'radiobutton'
		);
	} else {
		$price_for_display = apply_filters(
			'woocommerce_product_addons_option_price',
			$price_raw ? '(' . $price_prefix . wc_price( WC_Product_Addons_Helper::get_product_addon_price_for_display( $price_raw ) ) . ')' : '',
			$option,
			$i,
			$addon,
			'radiobutton'
		);
	}

	$duration_display     = $duration_raw;
	$duration_for_display = apply_filters(
		'woocommerce_product_addons_option_duration',
		$duration_raw ? ' ' . wc_appointment_pretty_addon_duration( $duration_raw ) : '',
		$option,
		$i,
		$addon,
		'radiobutton'
	);

	$selected = isset( $_POST[ 'addon-' . sanitize_title( $field_name ) ] ) ? $_POST[ 'addon-' . sanitize_title( $field_name ) ] : [];
	if ( ! is_array( $selected ) ) {
		$selected = array( $selected );
	}

	$current_value = ( in_array( sanitize_title( $option_label ), $selected ) ) ? 1 : 0;
	?>
	<p class="form-row form-row-wide wc-pao-addon-wrap wc-pao-addon-<?php echo sanitize_title( $field_name ) . '-' . $i; ?>">
		<label>
		<input
			type="radio"
			class="wc-pao-addon-field wc-pao-addon-radio"
			name="addon-<?php echo sanitize_title( $field_name ); ?>[]"
			data-raw-price="<?php esc_attr_e( $price_raw ); ?>"
			data-price="<?php esc_attr_e( $price_display ); ?>"
			data-price-type="<?php esc_attr_e( $price_type ); ?>"
			data-raw-duration="<?php esc_attr_e( $duration_raw ); ?>"
			data-duration="<?php esc_attr_e( $duration_display ); ?>"
			data-duration-type="<?php esc_attr_e( $duration_type ); ?>"
			value="<?php echo sanitize_title( $option_label ); ?>"
			data-label="<?php esc_attr_e( wptexturize( $option_label ) ); ?>"
			<?php checked( $current_value, 1 ); ?>
			<?php if ( WC_Product_Addons_Helper::is_addon_required( $addon ) ) { echo 'required'; } ?>
		/> <?php echo wptexturize( $option_label . ' ' . $price_for_display . $duration_for_display ); ?>
		</label>
	</p>
<?php } ?>
