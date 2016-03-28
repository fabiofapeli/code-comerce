<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Order;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function orders(){
       $user_id=Auth::user()->id;
       $orders=Order::where('user_id','=',$user_id)->get();
		$status=config('constants.orders.status');
      return view('store.orders',compact('orders','status'));
    }
}
