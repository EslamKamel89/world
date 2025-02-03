<x-app-layout>


    <div class="py-12">
        <div class=" overflow-hidden max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4  p-6 text-gray-900">
                @foreach ( $categories as $category )
					<x-category :category="$category" />
				@endforeach
            </div>
        </div>
    </div>
</x-app-layout>