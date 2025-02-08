<div>
    @if ( $initialVariations )
		<livewire:product-dropdown :variations="$initialVariations" :key="$initialVariations->first()->type" />
	@endif
    @if ( $skuVariant )
		<button class="btn btn-primary text-white" wire:click="addToCart">Add to cart
			({{ $skuVariant->formattedPrice() }})</button>
	@endif
</div>