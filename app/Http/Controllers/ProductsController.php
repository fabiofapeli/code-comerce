<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    private $product;
    private $tagModel;

    public function __construct(Product $product,Tag $tagModel)
    {
        $this->product=$product;
        $this->tagModel=$tagModel;
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
        $affectedProduct=$this->product->create($request->all());
        $this->setTagsId($request->TagList,$affectedProduct);
        return redirect()->route('products');
    }

    public function edit($id,Category $category){
        $product=$this->product->find($id);
        $categories=$category->lists('name','id');
        return view('products.edit',compact('product','categories'));
    }

    public function update(Requests\ProductRequest $request){
        $affectedProduct=$this->product->find($request->id);
        $affectedProduct->update($request->all());
        $this->setTagsId($request->TagList,$affectedProduct);
        return redirect()->route('products');
    }

    private function setTagsId($requestTags,$affectedProduct){
        $tagSync=[];
        if($requestTags!=''){
            $tagList=array_filter(array_map('trim',explode(',',$requestTags)));
            foreach($tagList as $tag){
                $tagSync[]=$this->tagModel->firstOrCreate(['name'=>$tag])->id;
            }
        }
        $affectedProduct->tags()->sync($tagSync);

    }

    public function destroy($id,ProductTag $product_tag){
        $this->product->find($id)->delete();
        $product_tag->where('product_id','=',$id)->delete();
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

    public function storeImage(Requests\ProductImageRequest $request,$id,ProductImage $productImage){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $image=$productImage::create(['product_id'=>$id,'extension'=>$extension]);
        Storage::disk('public_local')->put($image->id.'.'.$extension,File::get($file));
        // Criar pasta uploads em public e ajustar path da entrada public em config/filesystems.php
        return redirect()->route('images',['id'=>$id]);
    }

    public function destroyImage($id,ProductImage $ProductImage){
        $image=$ProductImage->find($id);
        $product_id=$image->product_id;
        $image_path=$image->id.'.'.$image->extension;
        if(file_exists(public_path('uploads\\').$image_path)) Storage::disk('public_local')->delete($image_path);
        $image->delete($id);
        return redirect()->route('images',['id'=>$product_id]);
    }


}
