<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //
    protected $fillable = ['item_id', 'user_id', 'qty', 'total_price'];
    protected $table = 'cart_details';
}
