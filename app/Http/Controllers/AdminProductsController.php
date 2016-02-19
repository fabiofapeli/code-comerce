<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;
    public function __construct(Product $product)
    {
        $this->products=$product;
    }

    public function index()
    {
        $products=$this->products->all();
        return view('admin.product',compact('products'));
    }

    public function create(){
        return "<h1>Create Products</h1>";
    }

    public function edit($id){
        if($products=$this->products->find($id)){
            return "<h1>Edit product ".$products->name."</h1>";
        }
        return "Product not found";
    }

    public function destroy($id){
        if($products=$this->products->find($id)){
        return "<h1>Delete product ".$products->name."</h1>";
        }
        return "Product not found";
    }
}
