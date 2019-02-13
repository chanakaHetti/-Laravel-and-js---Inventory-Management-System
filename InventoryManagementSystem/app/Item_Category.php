<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Category extends Model
{
    protected $table = 'item_categories';
    protected $fillable = [
        'category_name'
    ]; 

    public function sub_category()
    {
        return $this->hasMany('App\Sub_Category');
    }
}
