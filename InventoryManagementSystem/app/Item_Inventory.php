<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Inventory extends Model
{
    
    protected $table = 'item_inventories';
    
    protected $fillable = [
        'inventory_date',
        'grn_id',
        'inventory_item_id',
        'inventory_quantity',
        'inventory_balance',
    ];

    public function grn_item(){
        return $this->belongsTo('App\Grn_Item','grn_item_id'); 
    }
}
