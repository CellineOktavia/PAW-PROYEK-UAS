<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $fillable = [

        'nomor_faktur',
        'user_id',
        'total',
        'tanggal',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
