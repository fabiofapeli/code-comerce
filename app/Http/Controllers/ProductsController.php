<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

    public function images($id){
        $product=$this->product->find($id);
        return view('products.images',compact('product'));
    }

    public function createImage($id){
        $product=$this->product->find($id);
        return view('products.create_image',compact('product'));
    }

    public function storeImage(Request $request,$id,ProductImage $productImage){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $image=$productImage::create(['product_id'=>$id,'extension'=>$extension]);
        Storage::disk('public_local')->put($image->id.'.'.$extension,File::get($file));
        // Criar pasta uploads em public e ajustar path da entrada public em config/filesystems.php
        return redirect()->route('images',['id'=>$id]);
    }
}
