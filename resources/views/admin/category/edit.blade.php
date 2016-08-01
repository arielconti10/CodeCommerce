@extends('app')
@section('content')
    <div class="container">
        <h1>Edit category</h1>
        <div class="row">
            {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add category', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection