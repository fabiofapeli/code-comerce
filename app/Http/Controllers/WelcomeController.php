<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class WelcomeController extends Controller
{
	private $categories;
	public function __construct(Category $category)
	{
		$this->middleware('guest');
		$this->categories = $category;
	}
	
    public function exemplo(){
    	$categories = $this->categories->all();
		return view('exemplo',compact('categories'));
    }
}
