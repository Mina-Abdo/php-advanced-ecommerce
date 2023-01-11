<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'max_discount',
        'start_date',
        'end_date',
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('discount' , 'price_after_discount');
    }
}
