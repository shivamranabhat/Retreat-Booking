<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'main_image',
        'images',
        'summary',
        'features',
        'description',
        'highlights',
        'itinerary',
        'terms_and_conditions',
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

    public function inquiries()
    {
        return ($this->hasMany(Inquiry::class));
    }
    
    public function roundedAverageReview(): float
    {
        $average = $this->reviews->avg('rating');
        if (!$average) {
            return 0; 
        }
        return round($average * 2) / 2;
    }

    public function featured()
    {
        return ($this->hasOne(FeaturedPackage::class));
    }
    public function reviews()
    {
        return ($this->hasMany(Review::class));
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
    public function inclusions()
    {
        return $this->hasMany(Inclusion::class);
    }
    public function exclusions()
    {
        return $this->hasMany(Exclusion::class);
    }
}
