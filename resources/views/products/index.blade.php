@extends('app')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{route('products.create')}}" class="btn btn-default">New Product</a><br /><br />
        <table class="table">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{str_limit($product->description,30)}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category->name}}</td>
                <td><a href="{{ route('products.destroy',['id'=>$product->id]) }}">Delete</a> | <a href="{{ route('products.edit',['id'=>$product->id]) }}">Edit</a> | <a href="{{ route('images',['id'=>$product->id]) }}">Images</a></td>
            </tr>
            @endforeach
        </table>
        {!! $products->render() !!}

    </div>

@endsection