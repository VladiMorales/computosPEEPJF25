<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RNU extends Model
{
    //
    protected $table = 'rnu';
    protected $fillable = [
        'eleccion',
        'casilla'
    ];
}
