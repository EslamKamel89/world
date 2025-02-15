<?php

namespace App\Providers;
use App\Cart\Cart;
use App\Cart\Contracts\CartInterface;
use Illuminate\Support\Facades\App;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 */
	public function register(): void {
		//
		$cart = new Cart( session() );
		$this->app->singleton( CartInterface::class, fn() => $cart );
		$this->app->instance( Cart::class, $cart );
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void {
	}
}
