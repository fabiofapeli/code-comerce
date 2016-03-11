<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['category_id','name','description','price','featured','recommend'];

    public function category(){
       return $this->belongsTo('App\Category');
    }

    public function images(){
        return $this->hasMany('App\ProductImage');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart');
    }

    public function tags(){
        return $this->belongsToMany('App\tag','product_tags');
    }

    public function getTagListAttribute(){
       $tagsName=$this->tags->lists('name')->toArray();
       return implode(', ',$tagsName);
    }

    public function scopeFeatured(){
        return $this->where('featured','=','1');
    }

    public function scopeRecommend(){
        return $this->where('recommend','=','1');
    }

    public function scopeOfCategory($query,$id){
        return $query->where('category_id','=',$id);
    }

    public function item(){
        return $this->hasMany('App\OrderItem');
    }
}
