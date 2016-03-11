@extends('store.store')

@section('content')
    <div class="col-sm-3">
        @include('store._categories')
    </div>
    <div class="col-sm-9 padding-right">
        @if($order == 'empty')
            <h3>Carrinho de compras vazio</h3>

        @else
            <h3>Pedido realizado com sucesso</h3>

            <p>O Pedido #{{ $order->id }}, foi realizado com sucesso.</p>
        @endif


    </div>
@endsection