<?php
namespace App\Traits;
trait Pr {
	public static function pr( $value, ?string $title = null, bool $json = true, bool $dd = false ): mixed {
		if ( $dd ) {
			dd( $value );
		}
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
