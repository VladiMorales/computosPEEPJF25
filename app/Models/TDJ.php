<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TDJ extends Model
{
    //
    protected $table = 'tdj';
    protected $fillable = [
        'V1',
        'V2',
        'V3',
        'V4',
        'V5',
        'user_id',
        'status',
        'casilla'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['usename']);
    }
}
