<?php

namespace App\Livewire;

use Livewire\Component;

class ProductDropdown extends Component {
	public $variations;
	public function render() {
		return view( 'livewire.product-dropdown' );
	}
}
