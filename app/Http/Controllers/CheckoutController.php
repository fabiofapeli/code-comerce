<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\CheckoutEvent;
use App\Http\Requests;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Items\item;


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
               // pode ser usado  $orderItem->create porÃ©m deve se passar o 'order_id'=>$order->id
           }

           event(new CheckoutEvent(Auth::user(),$order,$cart));

           $cart->clear();

           return view('store.checkout',compact('order','categories'));

       }

        return view('store.checkout',['order'=>'empty','categories'=>$categories]);

   }
	
	public function test(CheckoutService $checkoutService){
		$checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

       return redirect($response->getRedirectionUrl());
	}
}
