<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    use HasFactory;
    protected $fillable=[
        'title','subtitle','image','alt','page','slug'
    ];
    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('title','like','%'.request('search').'%')->orWhere('page','like','%'.request('search').'%');
        }
    }
}
