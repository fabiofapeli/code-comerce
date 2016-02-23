@extends('app')

@section('content')
    <div class="container">
        <a href="{!! Route('categories') !!}" class="btn btn-default">Back</a><br />
        <h1>Create Category</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['method'=>'post','route'=>'categories.store']) !!}

        @include('categories._form')

        {!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

@endsection