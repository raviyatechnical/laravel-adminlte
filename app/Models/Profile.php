<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profile extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'image'
    ];
    //Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Attribute
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/images/'.$value);
        } else {
            return asset('admin\images\default\avatar.jpg');
        }
    }
}
