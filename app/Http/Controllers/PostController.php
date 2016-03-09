<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
     public function index(){
    	//return view('posts.index');
	}
	
	public function login(){
		return view('auth.login');
	}

	public function logout(){
        Auth::logout();
		return redirect()->route('store.index');
	}
	
	public function password(){
		return view('auth.password');
	}
	
	public function register(){
		return view('auth.register');
	}
	
	public function reset(){
		return view('auth.reset');
	}
	
}
