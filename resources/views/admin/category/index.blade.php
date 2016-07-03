@extends('app')
@section('content')
    <div class="container">
        <h1>List of categories</h1>
        <br>
        <a href="{{route('category.create')}}" class="btn btn-primary">New Category</a>
        <br>
        <br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="{{route('category.edit', ['id'=>$category->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('category.destroy', ['id'=>$category->id])}}" class="btn btn-danger">Deletar</a>
                    </td>

                </tr>
            @endforeach

        </table>


    </div>
    @endsection