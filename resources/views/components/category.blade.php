@props( [ 'category' ] )
<div>
    <div @class( [ 'font-semibold text-xl text-blue-800 leading-tight ' => $category->depth == 0 ] )>
        <a href="/categories/{{$category->slug}}">

            {{ $category->title }}
        </a>
    </div>
    @if ( $category->children && collect( $category->children )->isNotEmpty() )
		<div class="ml-4">
			@foreach ( $category->children as $cat )
				<x-category :category="$cat" />
			@endforeach
		</div>
	@endif
</div>