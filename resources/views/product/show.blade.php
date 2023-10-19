<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show a sneaker')
        </h2>
    </x-slot>
    <x-product-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Categories_id')</h3>
        <p>{{ $product->categories_id }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Name')</h3>
        <p>{{ $product->name }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Desciption')</h3>
        <p>{{ $product->description }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Image')</h3>
        <img src="{{ asset('image/' . $product->image) }}" alt="{{ $product->title }} Image">
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Price')</h3>
        <p>{{ $product->price }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Price')</h3>
        <p>{{ $product->quantity }}</p>
        @if($product->created_at != $product->updated_at)
            <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Last update')</h3>
            <p>{{ $product->updated_at->format('d/m/Y') }}</p>
        @endif
    </x-product-card>
</x-app-layout>
