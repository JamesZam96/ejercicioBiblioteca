<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'codeColor',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->hasOne(Book::class);
    }


    public function shelves()
    {
        return $this->hasMany(Shelf::class);
    }
}
