<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    //many to many relationship
    public function users()
    {
        return $this->belongsToMany('App\Models\Users');
    }

    //one to many relationship
    public function messages()
    {
        return $this->hasMany('App\Models\message');
    }
}
