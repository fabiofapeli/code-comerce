@extends('app')

@section('content')
    <div class="container">
        <a href="{!! Route('products') !!}" class="btn btn-default">Back</a><br />
        <h1>Create Product</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['method'=>'post','route'=>'products.store']) !!}

        @include('products._form')

        {!! Form::submit('Add Product',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

@endsection