<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sale_price',
        'quantity',
        'code',
        'status',
        'description',
        'purchase_price',
        'seller_id',
        'category_id',
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->hasMany(Order::class)->withPivot('price' , 'quantity' , 'quantity');
    }

    public function specs(){
        return $this->belongsToMany(Spec::class)->withPivot('value');
    }

    public function offers(){
        return $this->belongsToMany(Offer::class)->withPivot('discount' , 'price_after_discount');
    }

    public function favs(){
        return $this->belongsToMany(User::class , 'favs' , 'product_id' , 'user_id')->as('favs');
    }

    public function carts(){
        return $this->belongsToMany(User::class , 'carts' , 'product_id' , 'user_id')->as('carts')->withPivot('quantity');
    }

    public function reviews(){
        return $this->hasMany(Review::class );
    }
}
