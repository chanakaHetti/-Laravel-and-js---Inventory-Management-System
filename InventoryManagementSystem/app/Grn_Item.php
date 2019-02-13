<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grn_Item extends Model
{
    protected $table = 'grn_items';
    
    protected $fillable = [
        'inventory_item_id',
        'grn_quantity',
        'grn_item_remarks'  
    ];

    public function inventory_item(){
        return $this->belongsTo(Inventory_Item::class);
    }

    public function grn(){
        
        return $this->belongsTo('App\Grn');
    }

    public function item_inventory(){
        return $this->hasOne('App\Item_Inventory','grn_item_id'); 
    }
}
