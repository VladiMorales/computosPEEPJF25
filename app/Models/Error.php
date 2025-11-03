<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    //
    protected $table='errores';
    protected $fillable = [
        'eleccion',        
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['usename']);
    }
}
