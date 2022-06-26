<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct(){

        // Envoie de données àla vue
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all();
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    // fonction index permettant d'afficher la page d'accueil

    public function index(){
        $products = Product::published()->paginate($this->paginate); // pagination

        return view('front.index', ['products' => $products]);

    }

    // function show permet d'afficher en detail 1 seul produit cliquer

    public function show(int $id){

        $product = Product::find($id);

        return view('front.show', ['product' => $product]);
    }

    // fucntion showProductBySale() renvoie tous les produits en solde

    public function showProductBySale(){
        //
        $products = Product::with('picture')->where('state', 'sale')->paginate($this->paginate);

        return view('front.index', ['products' => $products]);
    }
// fucntion showProductByCategory() qui renvoie les produits par catégorie
    public function showProductByCategory(int $id){

        $category = Category::find($id);

        $products = $category->products()->paginate($this->paginate);

        return view('front.index', ['products' => $products, 'category' => $category]);
    }
}
