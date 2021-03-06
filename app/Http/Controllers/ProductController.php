<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $paginate = 15;

    public function __construct(){

        // méthode pour injecter des données à une vue partielle
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all();
            $view->with('categories', $categories );
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //permet d'afficher la page d'acceuil du back ( dans un tableau des produits)
        $products = Product::paginate($this->paginate);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sizes = Size::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();

        return view('back.product.create', ['sizes' => $sizes, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'sizes.*' => 'integer', // pour vérifier un tableau d'entiers
            'isVisible' => 'in:published,unpublished',
            'picture_title' => 'string|nullable',
            'picture' => 'image|max:3000',
            'reference' => 'string',
            'state' => 'string'
        ]);

        $product = Product::create($request->all()); // associé les fillables



        $product->sizes()->attach($request->sizes);


        $im = $request->file('picture');

        // si on associe une image à un produit
        if (!empty($im)) {

            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données;
            $product->picture()->create([
                'link' => $link,
                'title' => $request->title_image?? $request->title_image
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Le produit a été ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('back.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $sizes = Size::pluck('name', 'id')->all();
        $allSizes = [];
        foreach ($product->sizes as $productSize) {
            $allSizes[] = $productSize->id;
        }
        $categories = Category::pluck('name', 'id')->all();

        return view('back.product.create', compact('product', 'sizes', 'categories','allSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'sizes.*' => 'integer',
            'isVisible' => 'in:published,unpublished',
            'picture_title' => 'string|nullable',
            'picture' => 'image|max:3000',
            'reference' => 'string',
            'state' => 'string'
        ]);

        $product =Product::find($id);

        $product->update($request->all());


        $product->sizes()->sync($request->sizes);


        $im = $request->file('picture');


        if (!empty($im)) {

            $link = $request->file('picture')->store('images');


                Storage::disk('local')->delete($product->picture->link);
                $product->picture()->delete();



            $product->picture()->create([
                'link' => $link,
                'title' => $picture_title?? 'Titre'
            ]);

        }
        return redirect()->route('product.index')->with('message', 'Le produit a été modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Suppression effectué');
    }
}
