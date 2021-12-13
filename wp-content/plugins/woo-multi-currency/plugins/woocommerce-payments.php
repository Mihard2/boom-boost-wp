<?php

/**
 * Class WOOMULTI_CURRENCY_F_Plugin_WooCommerce_Payments
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOOMULTI_CURRENCY_F_Plugin_WooCommerce_Payments {
	protected $settings;

	public function __construct() {
		$this->settings = WOOMULTI_CURRENCY_F_Data::get_ins();
		add_filter( 'wcpay_eur_format', array( $this, 'wcpay_eur_format' ), 10, 2 );
	}

	/**
	 * Correct currency format for EUR
	 *
	 * @param $format
	 *
	 * @return mixed
	 */
	public function wcpay_eur_format( $format ) {
		$list_currencies  = $this->settings->get_list_currencies();
		$current_currency = $this->settings->get_current_currency();
		if ( $current_currency === 'EUR' ) {
			if ( $list_currencies[ $current_currency ]['pos'] ) {
				$format['currency_pos'] = $list_currencies[ $current_currency ]['pos'];
			}
			$format['thousand_sep'] = get_option( 'woocommerce_price_thousand_sep' );
			$format['decimal_sep']  = get_option( 'woocommerce_price_decimal_sep' );
			$format['num_decimals'] = $list_currencies[ $current_currency ]['decimals'];
		}

		return $format;
	}
}