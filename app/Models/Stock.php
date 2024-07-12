<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function stockstatus(){
        return $this->belongsTo(StockStatus::class,'stock_status_id');
    }
    
    public function trader(){
        return $this->belongsTo(Trader::class,'trader_id');
    }


    public function customerorder(){
        return $this->hasOne(CustomerOrder::class);
    }
    
    protected $fillable = [
        'product_name',
        'quantity',
        'description',
        'price',
        'trader_id',
        'stock_status_id'
    ];
}