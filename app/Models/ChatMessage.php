<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        "sender_id",
        "reciver_id",
        "message",


    ];


    public function chatOfUser()
    {
        return $this->belongsTo(User::class, "sender_id", "id");
    }
    public function chatOfUserReciver()
    {
        return $this->belongsTo(User::class, "reciver_id", "id");
    }
}
