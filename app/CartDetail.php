<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //
    protected $fillable = ['item_id', 'user_id', 'qty', 'total_price'];
    protected $table = 'cart_details';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function item() {
        return $this->belongsTo('App\Item');
    }
}
