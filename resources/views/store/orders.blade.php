@extends('store.store')

@section('content')

    <div class="col-sm-9 padding-right">
            <h3>Meus pedidos</h3>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Itens</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        <ul>
                            @foreach($order->item as $item)
                                <li>{{$item->product->name}}</li>
                                @endforeach
                        </ul></td>
                    <td>{{$order->total}}</td>
                    <td>{{ $status[$order->status] }}</td>
                </tr>
                    @endforeach
            </table>

    </div>
@endsection