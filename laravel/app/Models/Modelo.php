<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer',
        'model',
        'photo_id',
        'category_id',
        'price',
        'Created',
        'Updated'
    ];
}
