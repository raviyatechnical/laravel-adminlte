<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'user_id',
        'country_id',
        'name'
    ];
    //Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->hasOne(Country::class,'country_id','id');
    }

}
