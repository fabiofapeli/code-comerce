<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Product;

class storeController extends Controller
{
    public function index(Product $product){
        $categories=Category::all();
        $products_featured=$product->featured()->get();
        return view('store.index',compact('products_featured','categories'));
    }
}
