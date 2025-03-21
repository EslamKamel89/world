<x-app-layout>
    <x-slot name="header">
        <div class="space-x-1">
            @foreach ( $category->ancestors->reverse() as $ancestor )
				<a href='{{ "/categories/{$ancestor->slug}" }}'>{{ $ancestor->title }}</a>
				<span class="font-bold text-gray-300 last:hidden">/</span>
			@endforeach
        </div>
        <h2 class="mt-1 font-semibold text-xl text-gray-800 leading-tight">{{ $category->title }}</h2>
    </x-slot>
    product browser
</x-app-layout>