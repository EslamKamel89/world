<div class="my-3">
    <div class="font-semibold mb-1 capitalize">
        {{$variations->first()->type}}
    </div>

    <x-select wire:model.live="selectedVariation" class="w-full">
        <option value="">Select an option</option>
        @foreach ( $variations as $variation )
			<option value="{{$variation->id }}" {{ $variation->outOfStock() ? 'disabled' : '' }}>
				{{$variation->title}}
				<span class="!text-xs !text-gray-500 !ml-2">
					{{ $variation->lowStock() ? '(Low stock)' : ''}}
					{{$variation->outOfStock() ? '(Out Of Stock)' : '' }}</span>
			</option>
		@endforeach
    </x-select>
    @if ( $this->selectedVariationModel?->children->count() > 0 )

		<livewire:product-dropdown :variations="$this->selectedVariationModel->children->sortBy( 'order' )"
			:key="$this->selectedVariationModel->id" />

	@endif
</div>