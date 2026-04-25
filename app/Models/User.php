<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable; 


    protected $fillable = [
        'name', 'email', 'phone_number', 'password', 'role', 'address',
    ];

   
    protected $hidden = [
        'password', 'remember_token', 
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class)->latestOfMany(); // or just hasOne if only one cart
    }
    
}