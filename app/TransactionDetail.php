<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    protected $fillable = ['qty', 'transaction_id', 'item_id', 'total_price'];

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    public function item() {
        return $this->belongsTo('App\Item');
    }
}
