<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Product;
use App\Tag;

class storeController extends Controller
{
    public function index(Product $product,Category $category){
        $categories=$category->all();
        $products_featured=$product->featured()->get();
        $products_recommend=$product->recommend()->get();
        return view('store.index',compact('products_featured','products_recommend','categories'));
    }

    public function category($id,Category $category){
        $categories=$category->all();
        $category=$category->find($id);
        $products_category=Product::OfCategory($id)->get();
        return view('store.category',compact('products_category','categories','category'));
    }

    public function product($id,Product $product,Category $category){
        $categories=$category->all();
        $product=$product->find($id);
        $category=$category->find($product->category_id);
        return view('store.product',compact('product','categories','category'));
    }

    public function tag($id,Tag $tag,Category $category){
        $categories=$category->all();
        $tag=$tag->find($id);
        return view('store.tag',compact('tag','categories'));
    }
}
