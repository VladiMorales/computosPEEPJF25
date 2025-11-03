<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sr extends Model
{
    //
    protected $table = 'sr';
    protected $fillable = [
        'V1',
        'V2',
        'V3',        
        'user_id',
        'status',
        'casilla'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['usename']);
    }
}
