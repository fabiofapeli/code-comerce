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
        return $this->items[$id];
    }

    


//all
//add
//remove
//getTotal
}