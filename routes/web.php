<?php

use App\Cart\Cart;
use App\Cart\Contracts\CartInterface;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductShowController;
use App\Models\Category;
use App\Models\product;
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

Route::get( '/test', function (Cart $cartService) {
	$variation = Variation::find( 1 );
	dd( $variation );


	return [ 'message' => 'success' ];

} );

require __DIR__ . '/auth.php';
