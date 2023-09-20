<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fresh extends Model
{
    use HasFactory;

    protected $fillable = [

        "coin_rates",
        "hot_rates",
        "superhot_rates",
        
        


    ];

    public function userCoinsReq()
    {
        return $this->hasMany(UserCoinRequest::class,'freshes_id');
    }
}
