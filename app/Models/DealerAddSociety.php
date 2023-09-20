<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerAddSociety extends Model
{
    use HasFactory;


    protected $guarded = [];

    
    
    public function societyPicture() {
        return $this->hasMany(SocietyPicture::class, 'dealer_add_society_id', 'id');  
    }

    public function addSociety() {
        return $this->hasMany(AddSociety::class, 'add_society_id', 'id');  
    }

    public function plotSize() {
        return $this->hasMany(PlotSize::class, 'dealer_add_socity_id', 'id');  
    }
    
     public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');  
    }

    
}
