<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    // Agregar las propiedades permitidas para la asignación masiva
    protected $fillable = [
        'name',
        'location',
        'description',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
