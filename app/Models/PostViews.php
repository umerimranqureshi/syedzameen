<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostViews extends Model
{
    use HasFactory;


    protected $fillable = [

        "user_id",
        "post_id"

    ];

    public function post()
    {
        return $this->BelongsTo(Post::class,'id');
    }
}
