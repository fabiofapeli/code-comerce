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

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->hasMany('App\OrderItem');
    }
}
