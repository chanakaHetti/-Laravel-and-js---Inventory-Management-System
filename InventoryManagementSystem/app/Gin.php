<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gin extends Model
{
    protected $fillable = [
        'customer_id',
        'gin_date',
        'cus_name',
        'cus_address',
        'cus_city',
        'gin_remarks',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function gin_item(){
       
        return $this->hasMany('App\Gin_item');
    }
}
