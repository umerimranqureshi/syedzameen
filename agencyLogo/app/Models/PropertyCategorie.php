<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'purpose', 'property_type', 'property_sub_type'
    ];
}
