<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\inventory_item;
use App\item_category;


class Sub_Category extends Model
{
	public $table='sub_categories';
	protected $fillable = [
        'sub_category_name',' item_category_id'
    ]; 
 	public function item_category()
    {
        return $this->belongsTo('App\Item_Category');
    } 
    public function items()
    {
        return $this->hasMany('App\Inventory_Item');
    }  
}
