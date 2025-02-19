<?php

namespace App\Livewire;

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
		// $this->cartVariation = $this->variation->pivot;
		// dd( $this->variation->pivot, get_class_methods( $this->variation->pivot ) );
	}
	public function render() {
		return view( 'livewire.cart-item' );
	}
	public function updatedQuantity() {
		// dd( $this->cartVariation );
		// dd( $this->variation->pivot() );
		// DB::table( 'cart_variation' )->where( 'cart_id', $this->cartVariation->cart_id )
		// 	->where( 'variation_id', $this->cartVariation->variation_id )
		// 	->update( [
		// 		'quantity' => $this->quantity,
		// 	] );
		// $this->cartVariation()->update( [
		// 	'quantity' => $this->quantity,
		// ] );
	}
}
