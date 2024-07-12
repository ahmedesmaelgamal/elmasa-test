<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DeliveryMan extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function customerorders(){
        return $this->hasOne(CustomerOrder::class,'delivery_man_id');
    }
    
    protected $fillable = [
        'name',
        'address',
        'salary',
        'vechal_type'
    ];
}
