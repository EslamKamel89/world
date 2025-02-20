<?php

namespace App\Livewire;

use App\Cart\CartService;
use App\Models\Variation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartItem extends Component {
	public Variation $variation;
	public int $quantity;
	public Pivot $cartVariation;
	public function mount() {
		$this->quantity = $this->variation->pivot->quantity;
	}
	public function render() {
		return view( 'livewire.cart-item' );
	}
	public function updatedQuantity() {
		app( CartService::class)->changeCount( $this->variation, $this->quantity );
		$this->dispatch( 'cart.updated' );
		$this->dispatch( 'notification', [ 'body' => 'Quantity Updated' ] );
	}
}
