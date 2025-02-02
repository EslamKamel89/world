<?php

namespace App\Http\Controllers;

/**
 * Summary of Controller
 */
class Controller {
	/**
	 * Summary of pr
	 * @param mixed $value
	 * @param bool $json
	 * @return mixed
	 */
	public static function pr( $value, bool $json = true ): mixed {
		if ( $json ) {
			\Debugbar::info( json_decode( json_encode( $value ), true ) );
		} else {
			\Debugbar::info( $value );
		}
		return $value;

	}
}
