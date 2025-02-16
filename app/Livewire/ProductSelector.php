<?php

namespace App\Livewire;

use App\Cart\Cart as CartService;
use App\Models\product;
use App\Models\Variation;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductSelector extends Component {
	use \App\Traits\Pr;
	public product $product;
	public $initialVariations;
	public ?Variation $skuVariant;

	public function mount( Product $product ) {
		$this->product = $product;
		$this->initialVariations = Variation::where( 'product_id', $this->product->id )
			->with( [ 'stocks', 'descendantsAndSelf' ] )
			->tree()->get()->toTree();
	}

	public function render() {
		return view( 'livewire.product-selector', get_defined_vars() );
	}

	#[On('skuVaraintSelected') ]
	public function skuVariantSelected( $selectedVariation ) {
		if ( ! $selectedVariation ) {
			$this->skuVariant = null;
			return;
		}
		$this->skuVariant = Variation::find( id: $selectedVariation );
	}

	public function addToCart( CartService $cartService ) {
		// dd( $cartService, $this->skuVariant );
		$cartService->add( $this->skuVariant, 1 );
		$this->dispatch( 'cart.update' );
	}
}
