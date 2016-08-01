@extends('app')
@section('content')
    <div class="container">

        @if($errors->any())
            <ul class="alert" style="list-style: none">
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <h1>Create product</h1>
            {!! Form::open(['route'=>'products.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category: ') !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price: ') !!}
                    {!! Form::text('price', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('featured', 'Featured: ') !!}
                    {!! Form::checkbox('featured') !!}

                    {!! Form::label('recommended ', 'Recommendeded: ') !!}
                    {!! Form::checkbox('recommended') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add product', ['class'=>'btn btn-primary ']) !!}
                </div>
            {!! Form::close() !!}
    </div>
@endsection