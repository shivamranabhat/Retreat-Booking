<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','image','description','image_alt','slug'
    ];
    protected $table = 'locations'; 
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('name','like','%'.request('search').'%');
        }
    }
}
