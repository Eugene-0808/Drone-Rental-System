<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDetail extends Model
{
    use HasFactory;

    protected $table = 'profile_details';

    // Because the primary key is 'user_id', not 'id'
    protected $primaryKey = 'user_id';

    // The table does not have an auto-incrementing primary key
    public $incrementing = false;

    // No created_at / updated_at in the table
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'gender',
        'race',
        'religion',
        'dob',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}