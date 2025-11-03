<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VotosSCJN extends Model
{
    //
    protected $table = 'votosscjn';
    protected $fillable = [
        'voto',
        'status',
        'scjn_id',        
    ];
    public $timestamps = 'false';

}
