<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casilla extends Model
{
    //
    protected $table='casilla';
    protected $fillable = [
        'casilla',        
        'seccion',
        'tipo',
    ];

    
}
