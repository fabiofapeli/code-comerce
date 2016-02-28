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
}
