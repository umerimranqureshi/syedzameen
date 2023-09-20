<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function addSociety() {
        return $this->hasOne(DealerAddSociety::class, 'id', 'dealer_add_society_id');  
    }


    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');  
    }

   
    
}
