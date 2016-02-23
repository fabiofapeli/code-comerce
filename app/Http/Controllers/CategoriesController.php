<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category=$category;
    }

    public function index(){
        $categories=$this->category->paginate(10);
        return view('categories.index',compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request){
        $this->category->create($request->all());
        return redirect()->route('categories');
    }

    public function edit($id){
        $category=$this->category->find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Requests\CategoryRequest $request){
        $this->category->find($request->id)->update($request->all());
        return redirect()->route('products');
    }

    public function destroy($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories');
    }
}
