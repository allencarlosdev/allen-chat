<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;

class Chat extends Model
{
    use HasFactory;

    //many to many relationship
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    //one to many relationship
    public function messages() 
    {
    	return $this->hasMany(Message::class);
    }

}
