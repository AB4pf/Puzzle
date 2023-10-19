<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a product') }}
        </h2>
    </x-slot>
    <x-product-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <!-- cart_id -->
            <div>
                <x-input-label for="categories_id" :value="__('categories_id')" />
                <x-text-input  id="categories_id" class="block mt-1 w-full" type="number" name="categories_id" min="1" max="3" :value="old('categories_id')" required autofocus />
                <x-input-error :messages="$errors->get('categories_id')" class="mt-2" />
            </div>
            <!-- name -->
            <div>
                <x-input-label for="name" :value="__('name')" />
                <x-text-input  id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- description -->
            <div>
                <x-input-label for="description" :value="__('description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!-- image -->
            <div>
                <x-input-label for="image" :value="__('image')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <!-- price -->
            <div>
                <x-input-label for="price" :value="__('price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" min="0" :value="old('price')" required autofocus />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <!-- quantité -->
            <div>
                <x-input-label for="quantity" :value="__('quantity')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" min="0" max="10" :value="old('quantity')" required autofocus />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>
    </x-product-card>
</x-app-layout>
