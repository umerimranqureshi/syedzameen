<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AddToFavorite extends Model
{
    use HasFactory;



    /* public function addTofavorite()
    {
        sreturn $this->belongsTo(Post::class);
    }

    public function addTofavorite2()
    {
        return $this->belongsTo(User::class);
    asdasd} */

    protected $guarded = [];
    protected $table = 'add_to_favorites';


    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function post()
    {

        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
    public function image()
    {

        return $this->belongsTo(PostImage::class, 'post_id', 'post_id');
    }
}
