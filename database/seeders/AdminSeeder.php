<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::create([
            'name' => 'Yap Wen Qing',
            'email' => 'admin@dronefy.com',
            'phone_number' => '+60123456789',
            'address' => 'Kuala Lumpur, Malaysia',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'admin', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
