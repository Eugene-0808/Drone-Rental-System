<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
        'product_name' => 'DJI Mini 3',
        'product_description' => 'Lightweight drone...',
        'product_image' => '/images/dji_mini3.jpg',
        'product_price' => 120.00
        
        ]);
    }
}
