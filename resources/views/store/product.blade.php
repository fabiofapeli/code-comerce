@extends('store.store')

@section('content')
    <div class="col-sm-3">
        @include('store._categories')
    </div>
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">

                    <img src="{{ asset((count($product->images))?'uploads/'.$product->images()->first()->id.'.'.$product->images()->first()->extension:'images/no-img.jpg')}}" alt="" />

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $image)
                            <a href="#"><img src="{{asset('uploads/'.$image->id.'.'.$image->extension)}}" alt="" width="80"></a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{$category->name}} :: {{$product->name}}</h2>
                    {!! Form::open(['method'=>'post','route'=>'cart.add']) !!}
                    {{ Form::hidden('product_id', $product->id) }}
                    <p>
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                        @endforeach
                        <!-- Quantidade Form Input -->
                        <div class="form-group">
                        {!! Form::label('quantidade','Quantidade:') !!}
                        {!! Form::text('quantidade',$quantidade,['class'=>'form-control','style'=>'width:40px']) !!}
                        </div>
                    </p>

                    <p>{{$product->description}}</p>
                                <span>
                                    <span>R$ {{number_format($product->price,2)}}</span>
                                    {!! Form::submit('Adicionar ao carrinho',['class'=>'btn btn-success','style'=>'width:250px']) !!}

                     {!! Form::close() !!}
                                </span>
                    <p>
                    @foreach($product->tags as $tag)
                    <a href="{{route('store.tag',$tag->id)}}">{{$tag->name}}</a>&nbsp;
                    @endforeach
                    </p>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@endsection