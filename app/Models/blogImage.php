<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogImage extends Model
{
    use HasFactory;





    protected $fillable = [

        "name",
        "img_path",
        "blog_id"





    ];
}
