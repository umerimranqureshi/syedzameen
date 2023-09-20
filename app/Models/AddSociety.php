<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSociety extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function plotSize()
    {
        return $this->belongsTo(PlotSize::class, 'add_scocity_id');
    }

   
}
