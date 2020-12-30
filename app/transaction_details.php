<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction_details extends Model
{
    public function barang()
    {
        return $this->belongsTo('App\item', 'item_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\transaction', 'transaction_id', 'id');
    }
}
