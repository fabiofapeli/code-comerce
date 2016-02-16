<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;
    public function __construct(Product $product)
    {
        $this->products=$product;
    }

    public function index()
    {
        $products=$this->products->all();
        return view('admin.product',compact('products'));
    }
}
