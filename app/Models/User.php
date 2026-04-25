<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Your orders relationship (checkout table uses 'id' column to reference user)
    public function orders()
    {
        return $this->hasMany(Order::class, 'id');
    }

    // Your profile detail relationship
    public function profileDetail()
    {
        return $this->hasOne(ProfileDetail::class, 'user_id');
    }

    // Friend's cart relationship
    public function cart()
    {
        return $this->hasOne(Cart::class)->latestOfMany();
    }
}