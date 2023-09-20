<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotSize extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function dealerAddSociety(){
        return $this->belongsTo(DealerAddSociety::class);
      }


    public function addSociety()
    {
        return $this->belongsTo(AddSociety::class, 'add_society_id');
    }
    
}
