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
          Product::insert([
            [
                'product_name' => 'DJI Mini 3 Pro',
                'product_description' => 'Lightweight and portable drone with 4K HDR video, obstacle sensing, and long battery life.',
                'product_image' => 'images/drone1.png',
                'product_price' => 120.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'DJI Air 3',
                'product_description' => 'Dual-camera drone with a 48MP wide-angle and a 3x telephoto lens. Perfect for creative aerial photography.',
                'product_image' => 'images/drone2.png',
                'product_price' => 180.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'DJI Mavic 3 Classic',
                'product_description' => 'Professional-grade drone with a 4/3 CMOS Hasselblad camera for stunning 5.1K video.',
                'product_image' => 'images/drone3.png',
                'product_price' => 250.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'DJI Avata 2',
                'product_description' => 'Immersive FPV drone with improved camera, better flight time, and easy acro modes for thrilling flights.',
                'product_image' => 'images/drone4.png',
                'product_price' => 140.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'DJI Mini 4 Pro',
                'product_description' => 'Ultra-light under 249g drone with omnidirectional obstacle sensing and 4K/100fps video.',
                'product_image' => 'images/drone5.png',
                'product_price' => 160.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'DJI FPV',
                'product_description' => 'High-speed FPV drone that combines first-person view with 4K recording and multiple flight modes.',
                'product_image' => 'images/drone6.png',
                'product_price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
