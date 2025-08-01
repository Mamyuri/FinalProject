<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        Trip::insert([
            [
                'name' => 'رحلة العلا',
                'description' => 'زيارة الأماكن الأثرية في العلا.',
                'image' => 'https://picsum.photos/400/250?random=1',
                'price' => 499.99,
            ],
            [
                'name' => 'الرياض - البوليفارد',
                'description' => 'استمتع بالفعاليات والمطاعم.',
                'image' => 'https://picsum.photos/400/250?random=2',
                'price' => 299.99,
            ],
            [
                'name' => 'جدة - الواجهة البحرية',
                'description' => 'رحلة بحرية على شاطئ جدة.',
                'image' => 'https://picsum.photos/400/250?random=3',
                'price' => 399.99,
            ],
            [
                'name' => 'الطائف - الشفا',
                'description' => 'استمتع بالأجواء الباردة والمناظر.',
                'image' => 'https://picsum.photos/400/250?random=4',
                'price' => 349.99,
            ],
            [
                'name' => 'الدمام - الكورنيش',
                'description' => 'جولة بحرية وزيارة المطاعم.',
                'image' => 'https://picsum.photos/400/250?random=5',
                'price' => 279.99,
            ],
        ]);
    }
}
