<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    use HasFactory;
    protected $fillable = [
        'inclusion',
        'package_id',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
