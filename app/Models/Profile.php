<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Attribute
    public function getImageAttribute($value)
{
    if ($value) {
        //return asset('images/profile/' . $value);
    } else {
        return asset('admin\images\default\avatar.jpg');
    }
}
}
