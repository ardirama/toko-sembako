<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function transaction_detail(){
        return $this->hasMany('App\TransactionDetail');
    }
}
