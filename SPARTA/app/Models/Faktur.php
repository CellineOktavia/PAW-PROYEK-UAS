<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    protected $fillable = [
        'nomor_faktur',
        'tanggal',
        'total',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
