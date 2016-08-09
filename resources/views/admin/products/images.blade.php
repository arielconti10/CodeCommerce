@extends('app')
@section('content')
    <div class="container">
        <h1>Images of {{ $product->name }}</h1>
        <br>
        <a href="" class="btn btn-primary">New Image</a>
        <br>
        <br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extensio</th>

                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td>{{$image->image}}</td>
                    <td>{{$image->extension}}</td>


                    <td>
                        {{--<a href="{{route('products.edit', ['id'=>$image->product->id])}}" class="btn btn-primary">Editar</a>--}}
                        {{--<a href="{{route('products.destroy', ['id'=>$image->product->id])}}" class="btn btn-danger">Deletar</a>--}}
                    </td>

                </tr>
            @endforeach

        </table>

{{--        {!! $products->images->render()  !!}--}}


    </div>
    @endsection