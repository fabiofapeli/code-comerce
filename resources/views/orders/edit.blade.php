@extends('app')

@section('content')
    <div class="container">
        <a href="{!! Route('orders') !!}" class="btn btn-default">Back</a><br />
        <h1>Edit Order {{$order->id}}</h1>

        {!! Form::model($order,['method'=>'put','route'=>array('orders.update', "id=".$order->id)]) !!}
        
		<div class="form-group">
        <label>Client:</label> {{ $order->user->name }}
        </div>

		<div class="form-group">
        <label>Itens:</label> @foreach($order->item as $item)
                                <br />{{$item->product->name}} 
                              @endforeach
        </div>
        
       <div class="form-group">
        <label>Total:</label> {{ $order->total }}
        </div>

       <div class="form-group">
		{!! Form::label('status','Status:') !!}
		{!! Form::select('status',$status,null,['class'=>'form-control']) !!}
		</div>

        {!! Form::submit('Save Order',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

@endsection