<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /* use HasFactory; */
    Protected $table = 'Comment';
    protected $fillable = [
        'author_id',
        'ticket_id',
        'msg'
    ];

    const CREATED_AT = 'creation_date';
}
