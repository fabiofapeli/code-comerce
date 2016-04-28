<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const EmProcessamento = 0;
    const Despachado = 1;
    const Cancelado = 2;
    const Entregue = 3;

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
