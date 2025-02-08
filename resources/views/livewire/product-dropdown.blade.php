<div class="my-3">
    <div class="font-semibold mb-1 capitalize">
        {{ collect( $variations )?->first()['type'] }}
    </div>
    <x-select wire:model.live="selectedVariation" class="w-full">
        <option disabled value="">Select an option</option>
        @foreach ( $variations as $variation )
			<option value="{{ $variation['id'] }}">{{$variation['title']}}</option>
		@endforeach
    </x-select>
    @if ( $this->selectedVariationModel?->children->count() > 0 )
		<livewire:product-dropdown :variations="$this->selectedVariationModel->children->sortBy( 'order' )"
			:key="$selectedVariation" />

	@endif
</div>