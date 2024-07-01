<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'cover_image',
        'price',
        'description'
    ];
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
