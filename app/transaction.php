<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function transaction_details()
    {
        return $this->belongsTo('App\transaction', 'transaction_id', 'id');
    }
}
