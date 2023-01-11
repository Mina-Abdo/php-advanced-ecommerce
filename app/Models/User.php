<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'email_verified_at',
        'phone_verified_at',
        'verification_code',
        'verification_code_expiration',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function favs(){
        return $this->belongsToMany(Product::class , 'favs' , 'user_id' , 'product_id')->as('favs');
    }

    public function carts(){
        return $this->belongsToMany(Product::class , 'carts' , 'user_id' , 'product_id')->as('carts')->withPivot('quantity');
    }

    public function reviews(){
        return $this->hasMany(Review::class );
    }

    public function coupons(){
        return $this->belongsToMany(Coupon::class)->withPivot('coupon_expired_at' , 'max_no_of_users_per_coupon');
    }
}
