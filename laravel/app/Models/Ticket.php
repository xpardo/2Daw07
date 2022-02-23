<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Ticket extends Model
{
   // use HasFactory;
     /*  Protected $table = 'tickets' */
    protected $fillable = [
        'title',
        'desc',
        'author_id',
        'assigned_id',
        'status_id'
    ];
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $tabletable = 'tickets';
    public $timestamps = false;




      //use HasFactory;

}
