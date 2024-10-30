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
<<<<<<< HEAD
        'description',
        'highlights',
        'itinerary',
        'terms_and_conditions',        
        'included',
        'not_included',
=======
        'highlights',
        'itinerary',
        'terms_and_conditions',        
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
        'days',
        'price',
        'status',
        'start_date',
        'end_date',
        'instructors_id',
        'accommodations_id',
        'locations_id',
        'categories_id',
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
<<<<<<< HEAD
=======
    public function inclusions()
    {
        return $this->hasMany(Inclusion::class);
    }
    public function exclusions()
    {
        return $this->hasMany(Exclusion::class);
    }
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
}
