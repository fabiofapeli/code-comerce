<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests;

class OrdersController extends Controller
{
	public $orders;

	public function __construct(Order $orders)
	{
		$this->orders = $orders;
	}
	
    public function index()
    {
        $orders=$this->orders->paginate(10);
		$status=config('constants.orders.status');
        return view('orders.index',compact('orders','status'));
    }
	
	public function edit($id)
	{
		$order=$this->orders->find($id);
		$status=config('constants.orders.status');
        return view('orders.edit',compact('order','status'));
	}
	
	public function update(Requests\OrderRequest $request){
        $order=$this->orders->find($request->id);
        $order->update($request->all());
        return redirect()->route('orders');
    }
}
