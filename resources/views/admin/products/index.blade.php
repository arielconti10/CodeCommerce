@extends('app')
@section('content')
    <div class="container">
        <h1>List of Products</h1>
        <br>
        <a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>
        <br>
        <br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Recommended</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->featured}}</td>
                    <td>{{$product->recommended}}</td>
                    <td>{{ $product->category->name }}</td>

                    <td>
                        <a href="{{route('products.images', ['id'=>$product->id])}}" class="btn">Imagens</a>
                        <a href="{{route('products.edit', ['id'=>$product->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('products.destroy', ['id'=>$product->id])}}" class="btn btn-danger">Deletar</a>
                    </td>

                </tr>
            @endforeach

        </table>

        {!! $products->render()  !!}


    </div>
    @endsection