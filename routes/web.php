<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductShowController;
use App\Models\Variation;
use Illuminate\Support\Facades\Route;

Route::get( '/', HomeController::class);

Route::view( 'dashboard', 'dashboard' )
	->middleware( [ 'auth', 'verified' ] )
	->name( 'dashboard' );

Route::view( 'profile', 'profile' )
	->middleware( [ 'auth' ] )
	->name( 'profile' );

Route::get( '/products/{product:slug}', ProductShowController::class);

Route::get( '/test', function (Request $request) {
	/** @var Variation $variation */
	$variation = Variation::find( 1 );
	$result = $variation->stockCount();
	dd( json_decode( json_encode( $result ) ) );
} );

require __DIR__ . '/auth.php';
