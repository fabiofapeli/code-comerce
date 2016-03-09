@extends('store.store')

@section('content')
    <div class="col-sm-3">
        @include('store._categories')
    </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--category_items-->
            <h2 class="title text-center">{{$tag->name}}</h2>

            @include('store._products',['products'=>$tag->products]);

        </div><!--category_items-->

    </div>
@endsection