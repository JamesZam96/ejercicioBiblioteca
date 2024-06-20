<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryBook extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'library_id', 'copies', 'shelf'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
