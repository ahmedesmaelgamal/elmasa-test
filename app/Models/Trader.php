<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trader extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function traderphones(){
        return $this->hasMany(TraderPhone::class,'trader_id');
    }

    public function stock(){
        return $this->hasMany(Stock::class,'trader_id');
    }

    public function traderstatus(){
        return $this->belongsTo(TraderStatus::class,'trader_status_id');
    }

    protected $fillable = [
        'name',
        'address',
        'job_name',
        'trader_status_id'
    ];
}
