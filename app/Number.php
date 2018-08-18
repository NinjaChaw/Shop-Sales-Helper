<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $fillable = ['category_id', 'count'];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
