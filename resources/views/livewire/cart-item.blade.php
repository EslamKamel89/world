<div class="card card-side bg-base-100 shadow-xl my-3">
    <figure>
        <img src="{{ $variation->media?->first()?->getUrl() }}" alt="item image" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $variation->formattedPrice()}}</h2>
        <p class="text-xl font-bold mb-0">{{ $variation->product->title }}</p>

        <div class="flex flex-col items-start text-sm ">
            @foreach ( $variation->ancestorsAndSelf as $productVariation )
				<div><span class="font-bold">{{ $productVariation->type }}</span>: {{ $productVariation->title }}</div>
			@endforeach
        </div>

        <div class="flex items-center justify-start gap-3">
            <label for="quantity">Quantity</label>
            <select id="quantity" wire:model.live="quantity">
                @for ( $i = 1; $i <= $variation->stockCount(); $i++ )
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
            </select>
            <button class="btn btn-ghost" wire:click="remove">Remove</button>
        </div>
    </div>
</div>