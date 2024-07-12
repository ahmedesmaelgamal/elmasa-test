<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class StockStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function stock(){
        return $this->hasMany(Stock::class,'stock_status_id');
    }
}
