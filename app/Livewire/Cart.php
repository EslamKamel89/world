<?php

namespace App\Livewire;

use Livewire\Component;
use App\Cart\CartService;

class Cart extends Component {
	public function render( CartService $cartService ) {
		// $cartService->contents()->load()
		return view( 'livewire.cart', get_defined_vars() );
	}
}
