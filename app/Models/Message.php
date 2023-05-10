<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Chat;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
    	'content',
    	'chat_id'
    ];

    //Inverse one to many relationship
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    //Inverse one to many relationship
    public function chat()
    {
    	return $this->belongsTo(Chat::class);
    }

}

