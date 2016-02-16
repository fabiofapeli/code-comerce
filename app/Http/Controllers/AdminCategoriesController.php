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
}


