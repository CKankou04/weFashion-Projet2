@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="fs-1 fst-italic text-center">Bienvenue sur le tableau de L'adminitration</div>

        {{$products->links()}}
        @include('back.product.partials.flash')
        <div class="mb-2">
        <a href="{{route('product.create')}}" >
            <button type="button" class="btn btn-primary">Ajouter un produit</button>
        </a>
    </div>
        <p class="text-md-end">{{ $products->total() }} résultats</p>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name?? 'aucune category' }}</td>
                        <td>{{$product->price}} €</td>
                        <td>
                                @if($product->isVisible == 'published')
                                    <div >Publié</div>
                                @else
                                    <div>Non publié</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('product.edit', $product->id)}}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </td>
                        <td>
                            <div class="btn btn-primary text-center">
                            <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Supprimé" style="background:none; border:none; color:#FFFFFF; text-align: center;" />
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        aucun titre ...
                    @endforelse
                </tbody>
            </table>
            {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
