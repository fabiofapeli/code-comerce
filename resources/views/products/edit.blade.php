@extends('app')

@section('content')
    <div class="container">
        <a href="{!! Route('products') !!}" class="btn btn-default">Back</a><br />
        <h1>Edit Product {{$product->name}}</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($product,['method'=>'put','route'=>array('products.update', "id=".$product->id)]) !!}

        @include('products._form')

        {!! Form::submit('Save Product',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

@endsection