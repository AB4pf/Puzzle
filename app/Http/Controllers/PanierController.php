<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        // Récupérez les données du panier depuis la session
        $panier = session()->get('panier', []);

        // Calculez le total du panier
        $total_panier = 0;

        foreach ($panier as $produit) {
            $total_panier +=  $produit['quantite'] * $produit['price'];
        }


        // Retournez la vue du panier avec les données
        return view('panier.panier', compact('panier', 'total_panier'));
    }

    public function ajouter(Request $request, $produit_id)
    {
        $produit = Product::find($produit_id);

        if (!$produit) {
            return redirect()->route('produits.index')->with('error', 'Produit non trouvé.');
        }

        $panier = session()->get('panier', []);

        if (array_key_exists($produit_id, $panier)) {
            // Le produit existe déjà dans le panier, augmentez la quantité
            $panier[$produit_id]['quantite']++;
        } else {
            // Ajoutez le produit au panier
            $panier[$produit_id] = [
                'name' => $produit->name,
                'price' => $produit->price,
                'quantite' => 1,
            ];
        }

        session()->put('panier', $panier);

        return redirect()->route('panier.index');



    }
    public function supprimer($produit_id)
    {
        $panier = session()->get('panier', []);

        if (array_key_exists($produit_id, $panier)) {
            unset($panier[$produit_id]); // Supprimez le produit du panier
            session()->put('panier', $panier); // Mettez à jour la session
        }

        return redirect()->route('panier.index')->with('success', 'Produit supprimé du panier.');
    }
    public function modifier(Request $request, $produit_id)
    {
        $quantite = $request->input('quantite');

        if ($quantite <= 0) {
            // Gérer la suppression du produit si la quantité est nulle ou négative
            return redirect()->route('panier.supprimer', $produit_id);
        }

        $produit = Product::find($produit_id);

        if (!$produit) {
            return redirect()->route('produits.index')->with('error', 'Produit non trouvé.');
        }

        $panier = session()->get('panier', []);

        if (array_key_exists($produit_id, $panier)) {
            // Mettez à jour la quantité du produit dans le panier
            $panier[$produit_id]['quantite'] = $quantite;
        }

        session()->put('panier', $panier);

        return redirect()->route('panier.index')->with('success', 'Quantité du produit mise à jour.');
    }
}
