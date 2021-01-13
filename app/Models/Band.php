<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Songs;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function songs()
    {
        return $this->hasMany(Song::class, 'band_id');
    }
}
