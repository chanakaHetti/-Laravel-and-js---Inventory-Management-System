<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item_Cateogry;
use App\Sub_Category;

class Inventory_Item extends Model

{
	public $table = "inventory_items";

	protected $fillable = [
        'inventory_item_name',
        'inventory_item_description',
        'inventory_item_unit',
        'inventory_item_sub_category_id',
        'inventory_item_category_id'
    ]; 
 	public function item_category()
    {
        return $this->belongsTo('App\Item_Category');
    }  
    public function sub_category()
    {
        return $this->belongsTo('App\Sub_Category');
    }  
    
}
