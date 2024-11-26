<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=[
        'rating','title','description','user_id','package_id','slug'
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
