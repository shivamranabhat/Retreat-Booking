<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{

    use HasFactory;
    protected $fillable=[
        'name','image','description','price','slug'
    ];

    protected $table = 'room_types';

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false)
        {
            $query->where('name','like','%'.request('search').'%');
        }
    }
    public function inquiries()
    {
        return ($this->hasMany(Inquiry::class));
    }
   
}
