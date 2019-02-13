<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grn extends Model
{
    
    protected $fillable = [
        'supplier_id',
        'grn_date',
        'sup_name',
        'sup_address',
        'sup_city',
        'grn_remarks',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function grn_item(){
       
        return $this->hasMany('App\Grn_item');
    }

}
