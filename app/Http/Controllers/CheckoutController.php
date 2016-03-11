<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\CheckoutEvent;
use App\Http\Requests;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function place(Order $orderModel,OrderItem $orderItem){
       if(!(Session::has('cart'))){
           return false;
       }

       $cart=Session::get('cart');
        $categories=Category::all();
       if($cart->getTotal()>0){

           $order=$orderModel->Create(['user_id'=>Auth::user()->id,'total' => $cart->getTotal(),'status'=>0]);

           foreach($cart->all() as $k=>$item){
               $order->item()->create(['product_id'=>$k,'price'=>$item['price'],'qtd'=>$item['qtd']]);
               // pode ser usado  $orderItem->create porém deve se passar o 'order_id'=>$order->id
           }

           event(new CheckoutEvent(Auth::user(),$order,$cart));

           $cart->clear();

           return view('store.checkout',compact('order','categories'));

       }

        return view('store.checkout',['order'=>'empty','categories'=>$categories]);

   }
}
