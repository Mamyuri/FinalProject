<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'date',
        'image',
        'city',     // تمت إضافته
        'people'    // تمت إضافته
    ];

    public function requests()
    {
        return $this->hasMany(TripRequest::class);
    }
}