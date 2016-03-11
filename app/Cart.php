<?php

namespace App;
use Illuminate\Support\Facades\Session;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items=[];
    }

    public function add($id,$name,$price,$qtd){
        $this->items+=[
            $id => [
                'qtd' => $qtd,
                'name' => $name,
                'price' => $price
            ]
        ];
       // dd($this->items);
    }

    public function remove($id){
        unset($this->items[$id]);
    }

    public function all(){
        return $this->items;
    }

    public function getTotal(){
        $total=0;
        foreach($this->items as $item){
            $total+=$item['price']*$item['qtd'];
        }
        return $total;
    }

    public function clear(){
        $this->items=[];
    }

    public function find($id){
        return [];
    }

    public function getCart($product_id=0)
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


//all
//add
//remove
//getTotal
}