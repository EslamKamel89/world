<div>
    @if ( ! $cartService->isEmpty() )
		<div class="overflow-hidden sm:rounded-lg grid grid-cols-6 grid-flow-col gap-4">
			<div class="p-6 bg-white border-b border-gray-200 col-span-4 -mt-3 self-start
																					">
				@foreach ( $cartService->contents() as $variation )
					<livewire:cart-item :variation="$variation" :key="$variation->id" />
				@endforeach

			</div>
			<div class="p-6 bg-white border-b border-gray-200 col-span-2 self-start">
				<div class="space-y-3">
					<div class="space-y-1">
						<div class="space-y-1 flex items-center justify-between">
							<div class="font-semibold">Subtotal</div>
							<div class="font-semibold text-xl">
								{{ $cartService->formatedSubtotal() }}
							</div>
						</div>
						<div class="flex justify-end">
							<a href="/checkout" class="btn btn-sm text-xs btn-primary text-white">Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="p-6 bg-white border-b border-gray-200">
			Your Cart is Empty
		</div>
	@endif

</div>