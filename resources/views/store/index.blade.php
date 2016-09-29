@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
    @if(!empty($products))
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--$category_items-->
                @foreach($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">

                                    @if(count($product->images))
                                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" width="200" alt=""/>
                                    @else
                                        <img src="{{ url('images/no-img.jpg') }}" width="200" alt=""/>
                                    @endif
                                    <h2>R${{ $product->price }}</h2>
                                    <p>{{ $product->name }}</p>
                                    <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart">
                                        <i class="fa fa-crosshairs"></i>
                                        Mais detalhes
                                    </a>
                                    <a href="#" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Adicionar no carrinho
                                    </a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R${{ $product->price }}</h2>
                                        <p>{{ $product->name }}</p>

                                        <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart">
                                            <i class="fa fa-crosshairs"></i>
                                            Mais detalhes
                                        </a>
                                        <a href="#" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no carrinho
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!--cagtegory_items-->
            @endif

    @if(isset($product_featured))
        <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

                @foreach($product_featured as $featured)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                @if(count($featured->images))
                                    <img src="{{ url('uploads/'.$featured->images->first()->id.'.'.$featured->images->first()->extension) }}" width="200" alt=""/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" width="200" alt=""/>
                                @endif
                                <h2>R${{ $featured->price }}</h2>
                                <p>{{ $featured->name }}</p>
                                <a href="{{url('product/'.$featured->id)}}" class="btn btn-default add-to-cart">
                                    <i class="fa fa-crosshairs"></i>
                                    Mais detalhes
                                </a>
                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Adicionar no carrinho
                                </a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R${{ $featured->price }}</h2>
                                    <p>{{ $featured->name }}</p>

                                    <a href="{{url('product/'.$featured->id)}}" class="btn btn-default add-to-cart">
                                        <i class="fa fa-crosshairs"></i>
                                        Mais detalhes
                                    </a>
                                    <a href="#" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Adicionar no carrinho
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div><!--features_items-->

        @if(isset($product_recommended))
        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @foreach($product_recommended as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">

                            @if(count($product->images))
                                <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" width="200" alt=""/>
                            @else
                                <img src="{{ url('images/no-img.jpg') }}" width="200" alt=""/>
                            @endif

                            <h2>{{ $product->price }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i
                                        class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ $product->price }}</h2>
                                <p>{{ $product->name }}</p>
                                <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i
                                            class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="http://localhost:8000/cart/4/add"
                                   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                    no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--recommended-->
    </div>
    @endif
@stop