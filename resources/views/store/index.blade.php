
@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
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
                            <a href="#" class="btn btn-default add-to-cart">
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

                                <a href="#" class="btn btn-default add-to-cart">
                                    <i class="fa fa-crosshairs"></i>
                                    Mais detalhes
                                </a>
                                <a href="#"class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Adicionar no carrinho
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--features_items-->


        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">


                            <img src="http://localhost:8000/images/no-img.jpg" alt="" width="200"/>

                            <h2>R$ 14,00</h2>
                            <p>quasi</p>
                            <a href="http://localhost:8000/product/4" class="btn btn-default add-to-cart"><i
                                        class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ 14</h2>
                                <p>quasi</p>
                                <a href="http://localhost:8000/product/4" class="btn btn-default add-to-cart"><i
                                            class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="http://localhost:8000/cart/4/add"
                                   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                    no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">


                            <img src="http://localhost:8000/images/no-img.jpg" alt="" width="200"/>

                            <h2>R$ 96,00</h2>
                            <p>officia</p>
                            <a href="http://localhost:8000/product/5" class="btn btn-default add-to-cart"><i
                                        class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ 96</h2>
                                <p>officia</p>
                                <a href="http://localhost:8000/product/5" class="btn btn-default add-to-cart"><i
                                            class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="http://localhost:8000/cart/5/add"
                                   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                    no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="http://localhost:8000/uploads/14.jpg" alt=""/>

                            <h2>R$ 34.343,00</h2>
                            <p>fdsfsfdsfs</p>
                            <a href="http://localhost:8000/product/42" class="btn btn-default add-to-cart"><i
                                        class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ 34343</h2>
                                <p>fdsfsfdsfs</p>
                                <a href="http://localhost:8000/product/42"
                                   class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais
                                    detalhes</a>

                                <a href="http://localhost:8000/cart/42/add" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--recommended-->

    </div>
@stop