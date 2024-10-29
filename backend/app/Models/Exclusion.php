<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exclusion extends Model
{
    use HasFactory;
    protected $fillable = [
        'exclusion',
        'package_id',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
