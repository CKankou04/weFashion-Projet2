<!-- JQUERY STEP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<div class="wrapper">
@if (Route::is('product.create'))
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
             @method ('PUT')
        @endif
            @csrf
    <div id="wizard">
            <!-- SECTION 1 -->
            <h4>Ajout d'un nouveau produit</h4>
            <section>
                <div class="form-row">
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name', ($product->name)??'') }}" required>
                    @if($errors->has('name')) <span class="error bg-warning text-warning">{{$errors->first('name')}}</span>@endif
                </div>

                <div class="form-row">
                    <textarea class="form-control" style="margin-bottom: 18px" placeholder="Description" id="description" name="description" rows="3">{{ old('description',($product->description)??'') }}</textarea>
                </div>
                <div class="form-row">
                    <input type="text" class="form-control" placeholder="Email">
                </div>

                <div class="form-row">
                    <select id="category" name="category_id" class="form-control form-select">
                            <option value="0" class="form-control">Faites un choix</option>

                            @foreach($categories as $id => $name)
                                <option class="form-control" @selected(old('category_id', ($product->category->id)?? '') == $id) value="{{$id}}">{{$name}}</option>
                            @endforeach

                    </select>
                </div>
            </section> <!-- SECTION 2 -->
            <h4></h4>
            <section>
                <div class="form-row">
                    <input type="number" class="form-control" placeholder="price" id="price" name="price" step="0.01" min="0.01" max="9999.99" value="{{ old('price',($product->price) ??'') }}" required>
                </div>
                <div class="form-row">
                     <input type="text" class="form-control" placeholder="Reference" minlength="16" maxlength="16" id="reference" name="reference" value="{{ old('reference',($product->reference)??'') }}" required>
                </div>
                <div class="form-row">
                     <input type="text" class="form-control" placeholder="Titre de l'image" minlength="16" maxlength="16" id="picture_title" name="picture_title" value="{{ old('picture_title',($product->picture->title)??'') }}">

                    <input type="file" class="form-control-file" name="picture" id="picture">
                    <img src="{{ old('picture')}}" />
                </div>
            </section> <!-- SECTION 3 -->
            <h4></h4>
            <section>
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

            </section> <!-- SECTION 4 -->
            <h4></h4>
            <section>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                </svg>
                @if(Route::is('product.create'))
                    <button type="submit" class="btn btn-block  btn-primary  create-account btn-lg">Ajouter</button>
                @endif
            </section>
        </div>
    </form>
</div>
