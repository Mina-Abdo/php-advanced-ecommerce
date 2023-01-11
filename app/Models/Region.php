<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'city_id',
    ];

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
