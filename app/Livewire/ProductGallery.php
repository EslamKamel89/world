<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class ProductGallery extends Component {
	public product $product;
	public ?string $selectedMediaUrl;
	public function mount() {
		$this->selectedMediaUrl = $this->product->getFirstMediaUrl();

	}
	public function render() {
		return view( 'livewire.product-gallery' );
	}
	public function selectImage( string $mediaUrl ) {
		// dd( "mediaUrl" );
		$this->selectedMediaUrl = $mediaUrl;
	}
	public function registerMediaCollections(): void {
		$this
			->addMediaCollection( 'default' )
			->useFallbackUrl( asset( 'storage/placeholder.png' ) );
	}
}
