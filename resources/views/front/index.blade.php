@extends('layouts.master')

@section('content')

    <div class="container">
        <h1>Tous les produits</h1>
        <p class="text-md-end">{{ $products->total() }} résultats</p>
        <div class="row">
            {{$products->links()}}

            @foreach ($products as $product)

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <div class="imgcontainer">
                                    <a href="{{url('product', $product->id)}}" class="image">
                                        <img class="card-img-top" src="{{ asset('picture_product/'.$product->picture->link) }}" alt="">
                                    </a>
                                </div>

                                @if($product->state == "Sale")
                                <span class="product-discount-label">solde</span>
                                @endif
                                <a href="" class="add-to-cart">Ajouter au panier</a>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h3>
                                <div class="price">{{ $product->price }} €</div>
                            </div>
                        </div>
                    </div>

            @endforeach
        </div>
        <div class="row">
            <div class="col-12 align-content-lg-end">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
