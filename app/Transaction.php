<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = ['user_id'];

    public function details() {
        return $this->hasMany('App\TransactionDetail');
    }
}
