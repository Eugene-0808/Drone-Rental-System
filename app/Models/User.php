<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Order;
use App\Models\ProfileDetail;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'address',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function profileDetail()
{
    return $this->hasOne(ProfileDetail::class, 'user_id');
}
    protected $primaryKey = 'id';


    public $timestamps = false;

}