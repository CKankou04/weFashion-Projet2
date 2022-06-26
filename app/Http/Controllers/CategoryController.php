<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $paginate = 15;

    public function __construct(){

        // méthode pour injecter des données à une vue partielle
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate($this->paginate);
        return view('back.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retoure la vue du formulaire de création d'une Catégorie en backOffice
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // cette méthode permet de valider la création d'une catégorie
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::create($request->all());

        return redirect()->route('category.index')->with('message', 'La catégorie a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //function permettant de retourner le formulaire de modification d'une catégorie
        $category = Category::find($id);

        return view('back.category.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //function permettant de valider la modification d'une catégorie
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category =Category::find($id); // associé les fillables

        $category->update($request->all());

        return redirect()->route('category.index')->with('message', 'La categorie a été modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //suppression
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category.index')->with('message', 'Suppression effectué');
    }
}
