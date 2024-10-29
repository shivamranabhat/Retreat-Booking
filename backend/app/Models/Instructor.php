<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'image_alt',
        'experience',
        'description',
        'address',
        'phone_number',
        'slug'
    ];

    protected $table = 'instructors';

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('address', 'like', '%' . request('search') . '%')
                ->orWhere('phone_number', 'like', '%' . request('search') . '%');
        }
    }
}
