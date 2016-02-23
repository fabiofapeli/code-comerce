<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product=$product;
    }

    public function index(){
        $products=$this->product->paginate(10);
        return view('products.index',compact('products'));
    }

    public function create(Category $category){
        $categories=$category->lists('name','id');
        $categories=$categories->put('','Select')->sort();
        return view('products.create',compact('categories'));
    }

    public function store(Requests\ProductRequest $request){
        $this->product->create($request->all());
        return redirect()->route('products');
    }

    public function edit($id,Category $category){
        $product=$this->product->find($id);
        $categories=$category->lists('name','id');
        return view('products.edit',compact('product','categories'));
    }

    public function update(Requests\ProductRequest $request){
        $this->product->find($request->id)->update($request->all());
        return redirect()->route('products');
    }

    public function destroy($id){
        $this->product->find($id)->delete();
        return redirect()->route('products');
    }
}
