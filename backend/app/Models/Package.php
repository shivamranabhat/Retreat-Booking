<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'images',
        'summary',
        'features',
        'description',
        'highlights',
        'itinerary',
        'category',
        'terms_and_conditions',        
        'included',
        'not_included',
        'days',
        'price',
        'status',
        'start_date',
        'end_date',
        'instructor_id',
        'accommodation_id',
        'location_id',
        'category_id',
        'slug'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('summary', 'like', '%' . $filters['search'] . '%')
                ->orWhere('starting_date', 'like', '%' . $filters['search'] . '%')
                ->orWhere('end_date', 'like', '%' . $filters['search'] . '%')
                ->orWhere('category', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
