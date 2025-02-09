<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\Variation;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductSelector extends Component {
	use \App\Traits\Pr;
	public product $product;
	public $initialVariations;
	public $skuVariant;
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
		$this->skuVariant = Variation::find( $selectedVariation );
	}

	public function addToCart() {
		dd( $this->skuVariant );
	}
}
