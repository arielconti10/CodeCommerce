@extends('app')
@section('content')
    <div class="container">
        <h1>Upload Image</h1>
        @if($errors->any())
            <ul class="alert" style="list-style: none">
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
            {!! Form::open(['route'=>['products.images.store', $product->id], 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('image', 'Image: ') !!}
                    {!! Form::file('image', null, ['class'=>'form-control']) !!}
                </div>

        <div class="form-group">
            {{ Form::submit('Upload Image', ['class' => 'btn btn-primary']) }}
            {{--<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>--}}
        </div>
            {!! Form::close() !!}
    </div>
@endsection