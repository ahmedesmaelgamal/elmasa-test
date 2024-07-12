<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerPhone extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'phone_number',
        'customer_id'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
