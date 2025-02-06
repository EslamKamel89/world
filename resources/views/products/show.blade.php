<x-app-layout>
    <div class="py-12">
        <div class=" overflow-hidden max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 border-2 rounded-lg ">
                    <div class="text-center">image source</div>
                </div>
                <div class="flex flex-col gap-2 flex-1">
                    <div class="text-2xl font-bold">
                        {{ $product->title }}
                    </div>
                    <div class="text-5xl text-gray-500">
                        {{$product->formattedPrice() }}
                    </div>
                    <div class=" text-gray-500">
                        {{ $product?->description }}
                    </div>
                    <div class=" text-gray-500 mt-4">
                        <livewire:product-selector :product="$product" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>