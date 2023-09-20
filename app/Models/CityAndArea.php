<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityAndArea extends Model
{
    use HasFactory;

   

    protected $fillable = [

        'city',
        'area',

    ];
    protected $table = 'city_and_areas';


    public function cityAndArea()
    {
        return $this->belongsTo(CityAndArea::class, "city_area_id");
    }
    public function postImages()
    {
        return $this->hasMany(PostImage::class, "post_id");
    }

    public function postImagesOne()
    {
        return $this->hasOne(PostImage::class, "post_id");
    }
    public function post()
    {

        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
    
    public function propertyCate()
    {
        return $this->belongsTo(PropertyCategorie::class, "property_categorie_id");
    }

    public function favPostUser()
    {
        return $this->hasMany(AddToFavorite::class, 'post_id');
    }

    public function agencies()
    {
        return $this->belongsTo(Agencie::class, 'user_id', 'user_id');
    }
    public function postViews()
    {

        return $this->hasMany(PostViews::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
    public function requestOfClients()
    {

        return $this->hasMany(RequestAnAgent::class, 'post_id');
    }

}
