<?php

use App\Cart\CartService;
use App\Cart\Contracts\CartInterface;
use App\Http\Controllers\CartIndexController;
use App\Http\Controllers\CategoryShowController;
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
Route::get( '/categories/{category:slug}', CategoryShowController::class);

Route::get( '/cart', CartIndexController::class)->name( 'cart.index' );


Route::get( '/test', function (CartService $cartService) {
	$variation = Variation::find( 1 );
	dd( $variation );


	return [ 'message' => 'success' ];

} );

require __DIR__ . '/auth.php';
