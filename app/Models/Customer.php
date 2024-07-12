<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function customerphones(){
        return $this->hasMany(CustomerPhone::class,'customer_id');
    }
    public function customerorder(){
        return $this->hasMany(CustomerOrder::class,'customer_id');
    }
    protected $fillable = [
        'name',
        'address'
    ];



}

