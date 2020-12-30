<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'item_name',
        'price',
        'description',
        'stock',
    ];

    public function transaction_details()
    {
        return $this->hasOne('App\transaction_details', 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
