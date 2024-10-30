<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'name'
=======
        'name',
        'slug'
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
    ];

    public function packages()
    {
        return $this->hasMany(Package::class, 'category_id');
    }
}
