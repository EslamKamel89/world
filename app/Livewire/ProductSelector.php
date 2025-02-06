<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class ProductSelector extends Component {
	use \App\Traits\Pr;
	public product $product;
	public $initialVariations;
	public function mount( Product $product ) {
		$this->product = $product;
		$this->initialVariations =
			$this->pr( $this->product->variations()
				->where( 'parent_id', null )
				->get()
				->sortBy( 'order' )
				->groupBy( 'type' )->first()->toArray(), 'initial variations' );

	}
	public function render() {

		return view( 'livewire.product-selector', get_defined_vars() );
	}
}
