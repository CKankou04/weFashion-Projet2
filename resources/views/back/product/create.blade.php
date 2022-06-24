@extends('layouts.app')

@section('content')
    <div class="registration-form">
    <div class="container">
        @if (Route::is('product.create'))
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
             @method ('PUT')
        @endif
            @csrf
            <div class="row">
                <h2 class="title">Ajout d'un nouveau produit </h2>
                <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" minlength="5" maxlength="100" class="form-control" id="name" name="name" value="{{ old('name', ($product->name)??'') }}" required>
                            @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                        </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description',($product->description)??'') }}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                    </div>


                    <div class="form-group">
                        <label for="category">Catégories :</label><br>
                        <select id="category" name="category_id" class="form-control form-select">
                            <option value="0" class="form-control">Faites un choix</option>

                            @foreach($categories as $id => $name)
                                <option class="form-control" @selected(old('category_id', ($product->category->id)?? '') == $id) value="{{$id}}">{{$name}}</option>
                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" min="0.01" max="9999.99" value="{{ old('price',($product->price) ??'') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="reference">Référence</label>
                        <input type="text" minlength="16" maxlength="16" class="form-control" id="reference" name="reference" value="{{ old('reference',($product->reference)??'') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="picture_title">Titre de la photo</label>
                        <input type="text" maxlength="100" class="form-control" id="picture_title" name="picture_title" value="{{ old('picture_title',($product->picture->title)??'') }}">
                    </div>

                </div>



                <div class="col-12 col-md-6">

                    <div class="form-group">
                        <label>Statut</label> <br>
                        @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="state0" name="state" @checked(old('state', ($product->state)?? '') == 'Standard') value="Standard">
                            <label class="form-check-label" for="state0">Standard</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="status1" name="status" @checked(old('state', ($product->state)?? '') == 'Sale') value="Sale">
                            <label class="form-check-label" for="state1">Solde</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Choisissez les tailles</label> <br>
                        @error('sizes')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @foreach ($sizes as $id => $name)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="size{{$id}}" value="{{ $id }}" @checked (in_array( $id, old('sizes', ($allSizes)?? []) )) name="sizes[]" >
                                <label class="form-check-label" for="{{ $name}}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>Visibilité</label> <br>
                        @error('published')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="published1" @checked(old('isVisible', ($product->isVisible)?? '') == 'published') value="published"  name="isVisible">
                            <label class="form-check-label" for="published1">Publié</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="published0" @checked(old('isVisible', ($product->isVisible)?? '') == 'unpublished') value="unpublished"  name="isVisible">
                            <label class="form-check-label" for="published0">Non-Publié</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control-file" name="picture" id="picture">
                    </div>


                    @if (Route::is('product.edit'))
                        <div class="form-group">
                            <h2>Image associée :</h2>
                        </div>
                        <div class="form-group-image">
                            <img class="picture" src="{{url('picture_product', $product->picture->link)}}" alt="">
                        </div>
                    @endif


                </div>
            </div>
            <div>
                @if (Route::is('product.edit'))
                    <button type="submit" class="btn btn-block create-account  btn-primary btn-lg">Modifier</button>
                @endif
                @if(Route::is('product.create'))
                    <button type="submit" class="btn btn-block  btn-primary  create-account btn-lg">Ajouter</button>
                @endif
            </div>
        </form>
        <div class="m-xl-4">

        </div>
    </div>
@endsection