@extends('app')

@section('content')
    <div class="container">
        <h1>Images of {{$product->name}}</h1>
        <a href="{{route('images.create',['id'=>$product->id])}}" class="btn btn-default">New Image</a> <a href="{{route('products')}}" class="btn btn-default" >Back</a><br /><br />
        <table class="table">
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
            <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80" ></td>
                <td>{{$image->extension}}</td>
                <td><a href="{{route("images.destroy",['id'=>$image->id])}}">Delete</a></td>
            </tr>
            @endforeach
        </table>



    </div>

@endsection