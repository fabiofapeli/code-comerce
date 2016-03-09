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

    public function add($id,Product $product,Cart $cart){

        $cart = $this->getCart();

        $product=$product->find($id);
        $cart->add($id,$product->name,$product->price);
        Session::set('cart',$cart);
        return redirect()->route('cart');
    }

    public function destroy($id){
        $cart = $this->getCart();
        $cart->remove($id);
        Session::set('cart',$cart);
        return redirect()->route('cart');
    }

    private function getCart()
    {

        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;

    }
}
