<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SS extends Model
{
    protected $table = 'ss';
    protected $fillable = [
        'V1',
        'V2',
        'user_id',
        'status',
        'casilla'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['usename']);
    }

    
}
