@extends('layouts.master')

@section('content')

    <div class="row rounded-3">
        <div class="col-xl-3 mt-5">
            <a href="#" class="thumbnail">
                <img class="w-100" src="{{asset('picture_product/'.$product->picture->link)}}" alt="{{$product->picture->title}}">
            </a>
        </div>
        <div class="col-12 col-md-6 my-4 my-md-0">
            <p class="product-title fs-3 mt-5 fst-italic">{{$product->name}}</p><br>

            <div class="mb-3">
                <div class="fw-bold">Description:</div>
                <div>{{ $product->description }}</div>
            </div>
            <div class="mb-3">
                <span class="fw-bold">Référence du produit : </span>
                <span>{{ $product->reference }}</span>
            </div>

            <div class="mb-3">
             <span class="fw-bold">Price : </span><span>{{ $product->price }} € TTC</span>
            </div>

            <div>
             <span class="fw-bold">Catégorie: </span><span>{{ $product->category->name }}</span>
            </div>

            <select class="custom-select my-4">
                <option selected disabled>Taille</option>
                @foreach ($product->sizes as $size)
                    <option value="{{ $size->name }}">{{ $size->name }}</option>
                @endforeach
            </select><br><br>

            <button type="button" class="btn btn-success">Acheter</button>
        </div>
    </div>
@endsection
