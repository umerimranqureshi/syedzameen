<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject

// class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'facebook_id',
        'google_id',
        'apple_id',
        'password',
        "role",
        "img_path",
         'company_name',
        'city',
        'address',
        'type',
         'device_token',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function userFavPost()
    {

        return $this->hasMany(AddToFavorite::class, 'user_id');
    }

    public function getPhone()
    {
        return $this->hasOne(PhoneNumberVarification::class, 'user_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function Account()
    {
        return $this->hasOne(UserAccount::class, 'user_id');
    }
    public function Agencie()
    {
        return $this->hasOne(Agencie::class, 'user_id');
    }
}
