<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_title',
        'description',
        'price',
        'land_area',
        'bedrooms',
        'bathrooms',
        "city_area_id",
        "location",
        'contact_person_name',
        'mobile_number',
        'mobile2_number',
        'email',
        'user_id',
        'property_categorie_id',
        'address',
        'year',
        'mainimage',
        'electricitybackup',
        'floaring',
        'sub_type_plot',
        'sub_type_type',
        'unit',
        'admin_post',
        'disable',
        'post_boaster',
        'amenities',
        'video_link',
        'manual_location',

    ];

    public function postImages()
    {
        return $this->hasMany(PostImage::class, "post_id");
    }

    public function postImagesOne()
    {
        return $this->hasOne(PostImage::class, "post_id");
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



    public function cityAndArea()
    {
        return $this->belongsTo(CityAndArea::class, "city_area_id");
    }
}
