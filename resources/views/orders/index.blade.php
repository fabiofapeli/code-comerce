@extends('app')

@section('content')
    <div class="container">
        <h1>Orders</h1>
        <table class="table">
        	     <tr>
                    <th>Id</th>
                    <th>Client</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{ $status[$order->status] }}</td>
                    <td><a href="{{ route('orders.edit',['id'=>$order->id]) }}">Edit</a> </td>
</td>
                </tr>
                    @endforeach
        	
        </table>
        {!! $orders->render() !!}
    </div>

@endsection