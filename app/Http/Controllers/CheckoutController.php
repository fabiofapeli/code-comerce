<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function place(Order $orderModel,OrderItem $orderItem){
       if(!(Session::has('cart'))){
           return false;
       }

       $cart=Session::get('cart');

       if($cart->getTotal()>0){

           $order=$orderModel->Create(['user_id'=>Auth::user()->id,'total' => $cart->getTotal(),'status'=>0]);

           foreach($cart->all() as $k=>$items){
               $order->items()->create(['product_id'=>$k,'price'=>$items['price'],'qtd'=>$items['qtd']]);
               // pode ser usado  $orderItem->create porém deve se passar o 'order_id'=>$order->id
           }

           dd($order->items);

       }


   }
}
