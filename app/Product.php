<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'brand', 'price'];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
