@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td width="300" class="description"></td>
                            <td class="price">Valor</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td colspan="2"></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all() as $k=>$item)   {{--semelhante ao foreach porém com a opção empty--}}
                        <tr>
                            <td class="cart_product">
                                <a href="#">
                                    Imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{route('store.product',['id'=>$k])}}">{{$item['name']}}</a> </h4>
                                <p>Código: {{$k}}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{$item['price']}}
                            </td>
                            <td class="cart_quantity">
                                 {{$item['qtd']}}
                            </td>
                            <td class="cart_total">
                                 <p class="cart_total_price">R$ {{$item['price']*$item['qtd']}}</p>
                            </td>
                            <td class="cart_total">
                                <a href="{{route('store.product',['id'=>$k])}}" class="btn btn-success">Editar</a>
                            </td>
                            <td class="cart_delete">
                                 <a href="{{route('cart.destroy',['id'=>$k])}}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                Nenhum item encontrado.
                            </td>
                        </tr>
                    @endforelse
                    @if(count($cart->all())>0)
                    <tr class="cart_menu">
                        <td colspan="4">
                        </td>
                        <td>
                            Total: R$ {{$cart->getTotal()}}
                        </td>
                        <td colspan="2">
                            <a href="{{route('checkout.place')}}" class="btn btn-success">Fechar a conta</a>
                        </td>
                    </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection