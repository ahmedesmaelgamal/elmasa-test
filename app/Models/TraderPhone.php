<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TraderPhone extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'phone_number',
        'trader_id'
    ];
    public function trader(){
        return $this->belongsTo(Trader::class);
    }
}
