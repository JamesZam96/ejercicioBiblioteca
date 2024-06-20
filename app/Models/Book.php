<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'author_id', 'theme_id', 'user_id'];

    public function theme(){
        return $this->belongsTo(Theme::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function copies(){
        return $this->hasMany(Copy::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function libraryBooks()
    {
        return $this->hasMany(LibraryBook::class);
    }
}
