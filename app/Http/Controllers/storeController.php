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
        $products_recommend=$product->recommend()->get();
        return view('store.index',compact('products_featured','products_recommend','categories'));
    }

    public function category($id){
        $categories=Category::all();
        $category=Category::find($id);
        $products_category=Product::OfCategory($id)->get();
        return view('store.category',compact('products_category','categories','category'));
    }
}
