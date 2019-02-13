<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';
    public $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['cus_fname', 'cus_lname', 'cus_address', 'cus_city', 'cus_email','cus_status'];

}
