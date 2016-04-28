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


        <div class="alert alert-success" role="alert">
            <p>O Pedido #{{ $order->id }}, foi realizado com sucesso.</p>

            Um pop-up do PagSeguro foi aberto para que você possa efetuar o pagamento. Caso não tenha sido aberto, verifique o bloqueador de pop-up do seu navegador ou <a href="javascript:pagSeguro()">clique aqui</a> para tentar novamente.<br />
        @endif
        </div>
<form target="pagseguro" id='formPagSeg' action="https://pagseguro.uol.com.br/security/webpagamentos/webpagto.aspx" method="post">
<input type="hidden" name="email_cobranca" value="fabio.fapeli@gmail.com"  />
<input type="hidden" name="tipo" value="CP"  />
<input type="hidden" name="moeda" value="BRL"  />
<input type="hidden" name="ref_transacao" value="{{ $order->id }}">  
@foreach($order->item as $key =>$item)
  <input type="hidden" name="item_id_{{$key+1}}" value="{{ $item->product_id }}"  />
  <input type="hidden" name="item_descr_{{$key+1}}" value="{{$item->product->name}}"  />
  <input type="hidden" name="item_quant_{{$key+1}}" value="{{ $item->qtd }}"  />
  <input type="hidden" name="item_valor_{{$key+1}}" value="{{ $item->price }}"  />
  <input type="hidden" name="item_peso_{{$key+1}}" value="0"  />
  <input type="hidden" name="item_tipo_{{$key+1}}" value="CBR"  />
  <input type="hidden" name="item_ref_transacao_{{$key+1}}" value="A36"  />
 @endforeach
</form>  
<script type="text/javascript">
function pagSeguro(){
document.getElementById('formPagSeg').submit();
}

window.load=pagSeguro();
</script>
    </div>
@endsection