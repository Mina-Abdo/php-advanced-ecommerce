<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

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
        'shop_name'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
