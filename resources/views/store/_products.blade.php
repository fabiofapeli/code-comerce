@foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                {!! Form::open(['method'=>'post','route'=>'cart.add']) !!}
                {{ Form::hidden('product_id', $product->id) }}
                {{ Form::hidden('quantidade',1) }}
                <div class="productinfo text-center">

                    <img src="{{ asset((count($product->images))?'uploads/'.$product->images()->first()->id.'.'.$product->images()->first()->extension:'images/no-img.jpg')}}" alt="" />

                    <h2>R$ {{$product->price}}</h2>
                    <p>{{$product->name}}</p>
                    <a href="{{route('store.product',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                    {!! Form::submit('Adicionar ao carrinho',['class'=>'btn btn-default add-to-cart','style'=>'width:180px']) !!}
                </div>

                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{$product->price}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="{{route('store.product',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        {!! Form::submit('Adicionar ao carrinho',['class'=>'btn btn-default add-to-cart','style'=>'width:180px']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endforeach