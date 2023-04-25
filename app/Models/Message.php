<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\Models\User');
    }

    //Inverse one to many relationship
    public function chat()
    {
        return $this->belongsTo('App\Models\Chat');
    }
}
