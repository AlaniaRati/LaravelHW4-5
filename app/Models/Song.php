<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Band;

class Song extends Model
{
    protected $fillable = [
        'name',
        'band_id',
    ];

    public function band()
    {
        return $this->belongsTo(Band::class, 'band_id');
    }
}
