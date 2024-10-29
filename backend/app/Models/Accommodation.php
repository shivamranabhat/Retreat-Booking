<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'image',  
        'description', 
        'location', 
        'contact',
        'slug'
    ];

    protected $table = 'accommodations'; 

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('location', 'like', '%' . $filters['search'] . '%') 
                ->orWhere('contact', 'like', '%' . $filters['search'] . '%');
        }
    }
}
