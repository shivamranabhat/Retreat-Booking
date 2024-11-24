<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{

    use HasFactory;
    protected $fillable=[
        'name','email','people','start_date','message','room_type_id','package_id','status','slug'
    ];
    public function roomType()
    {
        return ($this->belongsTo(RoomType::class));
    }
    public function package()
    {
        return ($this->belongsTo(Package::class));
    }
}
