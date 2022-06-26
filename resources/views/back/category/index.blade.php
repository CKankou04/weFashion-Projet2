@extends('layouts.app')

@section('content')
    <div class="container ">
        {{$categories->links()}}
        <p><a href="{{route('category.create')}}"><button type="button" class="btn btn-primary btn-lg">Nouveau</button></a></p>

        @include('back.category.partials.flash')
        <p class="text-md-end">{{ $categories->total() }} résultats</p>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped" border="1">
                    <thead>
                    <tr align="center">
                        <th>Id</th>
                        <th>Catégorie</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td align="center">{{$category->id}}</td>
                            <td align="center">{{$category->name}} </td>

                            <td align="center">
                                <a href="{{route('category.edit', $category->id)}}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </td>

                            <td >
                            <div class="btn btn-primary text-center">
                            <form class="delete" method="POST" action="{{route('category.destroy', $category->id)}}">
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
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection
