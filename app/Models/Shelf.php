<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'theme_id',
        'library_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
