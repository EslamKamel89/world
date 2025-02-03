<?php

namespace App\Http\Controllers;

/**
 * Summary of Controller
 */
class Controller {
	/**
	 * Summary of pr
	 * @param mixed $value
	 * @param mixed $title
	 * @param bool $json
	 * @return mixed
	 */
	public static function pr( $value, ?string $title = null, bool $json = true ): mixed {
		if ( $title ) {
			\Debugbar::info( str( '_/\\_' )->repeat( 2 )->toString() . ' eslam dev ' . str( '_/\\_' )->repeat( 2 )->toString() );
			\Debugbar::info( $title );
		}
		if ( $json ) {
			\Debugbar::info( json_decode( json_encode( $value ), true ) );
		} else {
			\Debugbar::info( $value );
		}
		return $value;

	}
}
