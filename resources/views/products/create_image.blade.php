@extends('app')

@section('content')
    <div class="container">
        <a href="{{ route('images',['id'=>$product->id]) }}" class="btn btn-default">Back</a><br />
        <h1>Upload Image</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['method'=>'post','route'=>array('images.store', $product->id),'enctype'=>'multipart/form-data']) !!}

        @include('products._form_image')

        {!! Form::submit('Add Image',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

@endsection