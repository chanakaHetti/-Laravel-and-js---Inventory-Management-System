<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'sup_fname', 'sup_lname', 'sup_address', 'sup_city', 'sup_email', 'sup_status'
    ]; 

    public function grn()
    {
        return $this->hasMany('App\Grn');
    }
}
