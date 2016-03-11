<h1>Olá {{$user->name}}</h1>

<p>O Pedido #{{ $order->id }}, foi realizado com sucesso.</p>

<p>Segue dados do pedido.</p>

<table>
    <thead>
    <tr>
        <td>Item</td>
        <td>Valor</td>
        <td>Qtd</td>
        <td>Total</td>
    </tr>
    </thead>
    <tbody>
    @foreach($cart->all() as $k=>$item)
    <tr>
        <td>
            {{$item['name']}}
        </td>
        <td>
            R$ {{$item['price']}}
        </td>
        <td>
            {{$item['qtd']}}
        </td>
        <td>
           R$ {{$item['price']*$item['qtd']}}
        </td>
    </tr>
    @endforeach
        <tr>
            <td colspan="3">
            </td>
            <td>
                Total: R$ {{$cart->getTotal()}}
            </td>
        </tr>
    </tbody>
</table>

