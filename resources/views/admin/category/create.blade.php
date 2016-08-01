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
        <h1>Create category</h1>
            {!! Form::open(['route'=>'categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add category', ['class'=>'btn btn-primary ']) !!}
                </div>
            {!! Form::close() !!}
    </div>
@endsection