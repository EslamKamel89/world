<?php

namespace App\Http\Controllers;

use App\Cart\Cart as CartService;
use Illuminate\Http\Request;

class CartIndexController extends Controller {
	public function __invoke( CartService $cartService ) {
		return view( 'cart.index' );
	}
}
