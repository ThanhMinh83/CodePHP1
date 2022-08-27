<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'shipping_id','order_status','order_code','user_id'
    ];

    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';

   
     public function cus(){
         return $this->hasOne(Customer::class,'customer_id','id');
     }
    
}
