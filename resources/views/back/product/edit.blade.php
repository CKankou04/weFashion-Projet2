@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Create Product :  </h1>
                <form action="{{route('product.store', $product->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form">

                        <div class="form-group">
                            <label for="name">Nom:</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name"
                                   placeholder="Titre du livre">
                            @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description"class="form-control">{{$product->description}}</textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="category">Category :</label>
                        <select id="category" name="category_id">
                            <option value="0" {{is_null($product->category)? 'selected' : ''}}>Pas de catégorie</option>
                            @foreach($categories as $id => $name)
                                <option {{ (!is_null($product->category) and $product->category->id == $id)? 'selected' : '' }}  value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h1>Choisx de tailles</h1>
                    <div class="form-inline">
                        <div class="form-group">
                            @forelse($sizes as $id => $name)
                                <label class="control-label" for="size{{$id}}">{{$name}}</label>
                                <input name="sizes[]" value="{{$id}}"
                                       @if( is_null($product->sizes) == false and  in_array($id, $product->sizes()->pluck('id')->all()))
                                       checked
                                       @endif
                                       type="checkbox" class="form-control"
                                       id="size{{$id}}">
                            @empty
                            @endforelse
                        </div>
                    </div>
            </div><!-- #end col md 6 -->
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Modifiez un produit</button>
                <div class="input-radio">
                    <h2>State</h2>
                    <input type="radio" @if($product->state == 'published') checked @endif name="state" value="published" checked> publier<br>
                    <input type="radio" @if($product->state == 'unpublished') checked @endif name="state" value="unpublished" > dépulier<br>
                </div>
                <div class="input-file">
                    <h2>File :</h2>
                    <label for="category">Title image :</label>
                    <input type="text" name="title_image" value="{{old('title_image')}}">
                    <input class="file" type="file" name="picture" >
                    @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
                </div>
                @if($product->picture)
                    <div class="form-group">
                        <h2>Image associée :</h2>
                        <label for="category">Title image :</label>
                        <input type="text" name="title_image" value="{{$product->picture->title}}">
                    </div>
                    <div class="form-group">
                        <img width="300" src="{{url('images', $product->picture->link)}}" alt="">
                    </div>
                @endif
            </div><!-- #end col md 6 -->
            </form>
        </div>
@endsection
