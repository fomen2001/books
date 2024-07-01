<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'name',
        'email',
        'address',
        'city',
        'state',
        'zip',
        'card_number',
        'expiry_date',
        'cvv',
        'total_amount',
        'quantity',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
