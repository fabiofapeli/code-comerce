<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;
    public function __construct(Category $category)
    {
        $this->categories=$category;
    }

    public function index()
    {
        $categories=$this->categories->all();
        return view('admin.category',compact('categories'));
    }

    public function create(){
        return "<h1>Create Categories</h1>";
    }

    public function edit($id){

        if($categories=$this->categories->find($id)){
            return "<h1>Edit category ".$categories->name."</h1>";
        }
        return 'Category not found';
    }

    public function destroy($id){
        if($categories=$this->categories->find($id)) {
            return "<h1>Delete category " . $categories->name . "</h1>";
        }
        return 'Category not found';
    }
}


