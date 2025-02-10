<div class="space-y-4 ">
    <img class="image-full" src="{{ $selectedMediaUrl ? $selectedMediaUrl : asset( 'storage/placeholder.png' ) }}" {{--
        src="{{ $selectedMediaUrl}}" alt="not found" --}}>
    <div class="grid grid-cols-6 gap-2">
        @foreach ( $product->media as $media )
			<button wire:click="selectImage('{{$media->getUrl()}}')">
				<img src="{{$media->getUrl()}}">
			</button>
		@endforeach
    </div>
</div>