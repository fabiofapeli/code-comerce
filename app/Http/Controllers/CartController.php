<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests;
use App\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;
    public function __construct(Cart $cart)
    {
        $this->cart=$cart;
    }

    public function index(){
        if(!Session::has('cart')){
            Session::set('cart',$this->cart);
        }
        return view('store.cart',['cart'=>Session::get('cart')]);
    }

    public function add(Requests\CartRequest $request,Product $product,Cart $cart){
        $product_id=$request->product_id;
        $cart = $this->getCart();
        $cart->remove($product_id);
        $qtd=$request->quantidade;
        $cart = $this->getCart();
        $product=$product->find($product_id);
        $cart->add($product_id,$product->name,$product->price,$qtd);
        Session::set('cart',$cart);
        return redirect()->route('cart');
    }

    public function destroy($id,Cart $cart){
        $cart = $this->getCart();
        $cart->remove($id);
        Session::set('cart',$cart);
        return redirect()->route('cart');
    }
	
	private function getCart($product_id=0)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        if($product_id==0){
            return $cart;
        }
        else{
            return isset($cart->items[$product_id])?$cart->items[$product_id]:0;
        }


    }

}
