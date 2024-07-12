<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function deliveryman(){
        return $this->belongsTo(DeliveryMan::class,'delivery_man_id');
    }

    public function stock(){
        return $this->belongsTo(Stock::class,'stock_id');
    }


    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function customerorderstatus(){
        return $this->belongsTo(CustomerOrderStatus::class,'customer_order_status_id');
    }


    protected $fillable = [
        'customer_id',
        'stock_id',
        'delivery_man_id',
        'customer_order_status_id'
    ];
}
