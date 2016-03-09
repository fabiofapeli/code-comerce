<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'total',
        'status'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function items(){
        return $this->hasMany('App\OrderItem');
    }
}
