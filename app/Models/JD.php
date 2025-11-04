<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JD extends Model
{
    //
    protected $table = 'jd';
    protected $fillable = [
        'V1',
        'V2',
        'V3',
        'V4',
        'V5',
        'V6',
        'V7',
        'V8',
        'V9',
        'V10',
        'user_id',
        'status',
        'casilla'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['usename']);
    }
}
