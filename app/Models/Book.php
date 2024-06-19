<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function themes(){
        return $this->belongsTo(Theme::class);
    }

    public function authors(){
        return $this->belongsTo(Author::class);
    }

    public function copies(){
        return $this->hasMany(Copy::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
