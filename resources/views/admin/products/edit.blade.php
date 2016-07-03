@extends('app')
@section('content')
    <div class="container">
        <h1>Edit category</h1>
        <div class="row">
            {!! Form::open(['route' => ['product.update', $product->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price: ') !!}
                    {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('recommended', 'Recommended: ') !!}
                    {!! Form::checkbox('recommended', null, $product->recommended == 1 ? true : false) !!}
                    {!! Form::label('featured', 'Featured: ') !!}
                    {!! Form::checkbox('featured', null, $product->featured == 1 ? true : false) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Edit Product', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection