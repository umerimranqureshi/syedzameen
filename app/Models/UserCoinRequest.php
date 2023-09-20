<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoinRequest extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'user_id',
        'coins',
        'allow_coins',
        'rupees',
        'freshes_id',
    ];
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function freshe()
    {
        return $this->hasOne(Fresh::class,'id','freshes_id');
    }
}
