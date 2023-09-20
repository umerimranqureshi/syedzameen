<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addmanage extends Model
{
    use HasFactory;

    
    protected $guarded = [];
    protected $table = 'addmanage';

    protected $fillable = [
        'logo'
    ];
}
