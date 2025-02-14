<?php

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

Route::get( '/test', function (Request $request) {
	/** @var Product $product  */
	// $variation = Variation::find( 6 );
	// $variation->addMedia( __DIR__ . '../../' . 'n_white.png' )
	// 	->preservingOriginal()
	// 	->toMediaCollection();

	return [ 'message' => 'success' ];

} );

require __DIR__ . '/auth.php';
