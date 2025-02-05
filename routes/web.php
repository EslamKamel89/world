<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductShowController;
use Illuminate\Support\Facades\Route;

Route::get( '/', HomeController::class);

Route::view( 'dashboard', 'dashboard' )
	->middleware( [ 'auth', 'verified' ] )
	->name( 'dashboard' );

Route::view( 'profile', 'profile' )
	->middleware( [ 'auth' ] )
	->name( 'profile' );

Route::get( '/products/{product:slug}', ProductShowController::class);

require __DIR__ . '/auth.php';
