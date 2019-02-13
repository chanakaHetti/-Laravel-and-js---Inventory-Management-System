<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gin_Item extends Model
{
    protected $table = 'gin_items';

    protected $fillable = [
        'inventory_item_id',
        'gin_quantity',
        'gin_item_remarks'  
    ];

    public function inventory_item(){
        return $this->belongsTo(Inventory_Item::class);
    }

    public function gin(){
        return $this->belongsTo('App\Gin');
    }
}
