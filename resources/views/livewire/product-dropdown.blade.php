<div class="my-3">
    <div class="font-semibold mb-1 capitalize">
        {{ collect( $variations )?->first()['type'] }}
    </div>
    <x-select class="w-full">
        <option value="">Select an option</option>
        @foreach ( $variations as $variation )

			<option value="">{{ $variation['title'] }}</option>
		@endforeach
    </x-select>
</div>