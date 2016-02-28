@extends('store.store')

@section('content')
    <div class="col-sm-3">
        @include('store._categories')
    </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @foreach($products_featured as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">

                                <img src="{{(count($product->images))?'uploads/'.$product->images()->first()->id.'.'.$product->images()->first()->extension:'images/no-img.jpg'}}" alt="" />

                                <h2>R$ {{$product->price}}</h2>
                                <p>{{$product->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{$product->price}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
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


                            <img src="images/no-img.jpg" alt="" width="200"/>

                            <h2>R$ 14,00</h2>
                            <p>quasi</p>
                            <a href="product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ 14</h2>
                                <p>quasi</p>
                                <a href="product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--recommended-->
    </div>
@endsection