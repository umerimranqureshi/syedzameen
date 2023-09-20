<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;


    protected $fillable = [

        "title",
        "content",
        "header",
        "tags",
        "user_id"

    ];



    public function blogImages()
    {
        return $this->hasMany(blogImage::class, "blog_id");
    }

    public function blogOneImage()
    {
        return $this->hasOne(blogImage::class, "blog_id");
    }
}
