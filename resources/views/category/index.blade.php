<x-app-layout>
    <link rel="stylesheet" href="css/style.css">
    <header>
        <div class="menu">
            <div class="menu-top">
                <a href="acceuil.html"><p>@lang('Acceuil')</p></a>
                <a href="acceuil.html"><img class="logo" src="image/logo.png" alt="logo"></a>
            </div>
            <div class="menu-bottom">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
                <a href="{{ route('panier.index') }}"><img class="pannier" src="image/pannier.png" alt="pannier"></a>
            </div>
        </div>
        <div class="bandeau">
            <div class="ctg">
                <a href="Machine.html"><p>Catégorie :  Machines</p></a>
                <a href="Instrument.html"><p>Instruments de musique</p></a>
            </div>
            <div class="ppc">
                <p>Paiement par Paypal ou Cheque</p>
            </div>
        </div>
    </header>
    <section class="all_section">
        <div class="all_article">
            @if ($product)
                @foreach($product as $product)
                    <div class="article">
                        <a href="{{ route('product.show', $product->id) }}">
                            <img class="img" src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }} Image">
                        </a>
                        <div class="art">
                            <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                            <p>{{ $product->price }}</p>
                        </div>
                        <div class="but">
                            <a href="{{ route('panier.ajouter', $product->id) }}">Ajouter</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Aucun produit n'est disponible dans cette catégorie pour le moment.</p>
            @endif
        </div>
    </section>
</x-app-layout>
