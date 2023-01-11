<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'status',
        'total_price',
        'final_price',
        'delivery_date',
        'address_id',
        'coupon_id'
    ];

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('price' , 'quantity' , 'quantity');
    }
}
