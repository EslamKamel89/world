<?php

namespace App\Livewire;

use App\Models\Variation;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ProductDropdown extends Component {
	use \App\Traits\Pr;
	public $variations;
	public $selectedVariation;
	public function render() {
		return view( 'livewire.product-dropdown' );
	}
	#[Computed ]
	public function selectedVariationModel() {
		if ( ! $this->selectedVariation ) {
			return null;
		}
		return Variation::find( $this->selectedVariation );
	}
	public function updatedSelectedVariation() {
		$this->pr( $this->selectedVariationModel );
	}
}
