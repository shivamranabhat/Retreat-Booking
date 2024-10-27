<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'score',
    ];

    // Defining the relationship (assuming Package model exists)
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
