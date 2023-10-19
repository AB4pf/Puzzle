<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Acceuil')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow pt-6">
                    <table>
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-2 py-2 text-xs text-gray-500">#</th>
                            <th class="px-2 py-2 text-xs text-gray-500">@lang('Name')</th>
                            <th class="px-2 py-2 text-xs text-gray-500"></th>
                            <th class="px-2 py-2 text-xs text-gray-500"></th>
                            <th class="px-2 py-2 text-xs text-gray-500"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach ($panier as $produit_id => $produit)
                            <tr>
                                <td>{{ $produit['name'] }}</td>
                                <td>${{ $produit['price'] }}</td>
                                <td>{{ $produit['quantite'] }}</td>
                                <td>${{ $produit['quantite'] * $produit['price'] }}</td>
                                <x-link-button href="{{ route('panier.supprimer', $produit_id) }}">
                                    @lang('Supprimer')
                                </x-link-button>
                                <x-link-button href="{{ route('panier.modifier', $produit_id) }}">
                                    @lang('modifier')
                                </x-link-button>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
