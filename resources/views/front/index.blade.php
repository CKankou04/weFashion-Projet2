@extends('layouts.master')

@section('content')

    <div class="container">
        <h1>Tous les produits</h1>
        <p class="text-md-end">{{ $products->total() }} résultats</p>
        <div class="row">
            {{$products->links()}}

            @foreach ($products as $product)
                <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-content" >
                                    <img class="card-img-top" src="{{ asset('picture_product/'.$product->picture->link) }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h5><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h5>
                                    <span class="price">{{ $product->price }} €</span><br>
                                    <button type="button" class="btn btn-primary">Ajouter au panier ici</button><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="{{url('product', $product->id)}}" class="image">
                                    <img class="card-img-top" src="{{ asset('picture_product/'.$product->picture->link) }}" alt="">
                                </a>
                                @if($product->state =="sale")
                                <span class="product-discount-label">promo</span>
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
