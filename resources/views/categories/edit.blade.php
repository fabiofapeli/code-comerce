@extends('app')

@section('content')
    <div class="container">
        <a href="{!! Route('categories') !!}" class="btn btn-default">Back</a><br />
        <h1>Edit Category {{$category->name}}</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($category,['method'=>'put','route'=>array('categories.update', "id=".$category->id)]) !!}

        @include('categories._form')

        {!! Form::submit('Save Category',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

@endsection