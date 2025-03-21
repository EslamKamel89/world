<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Cart' ) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" overflow-hidden max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:cart />

        </div>
    </div>
</x-app-layout>