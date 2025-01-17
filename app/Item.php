<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['name', 'description', 'price', 'category_id', 'imageUrl'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
