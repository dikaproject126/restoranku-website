<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::query()->delete();

        $items = [
            [
                'name' => 'Nasi Goreng Kampung',
                'category_id' => 1, // Makanan
                'price' => 25000,
                'description' => 'Nasi goreng khas Jawa dengan bumbu rempah tradisional, disajikan dengan telur mata sapi, sate ayam, kerupuk, dan acar segar.',
                'img' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=600&auto=format&fit=crop&q=80',
                'is_active' => true,
            ],
            [
                'name' => 'Sate Ayam Madura',
                'category_id' => 1, // Makanan
                'price' => 30000,
                'description' => '10 tusuk sate daging ayam pilihan yang empuk, dibakar dengan arang kelapa, disajikan dengan bumbu kacang khas Madura dan bawang goreng.',
                'img' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600&auto=format&fit=crop&q=80',
                'is_active' => true,
            ],
            [
                'name' => 'Rendang Daging Sapi',
                'category_id' => 1, // Makanan
                'price' => 45000,
                'description' => 'Daging sapi pilihan yang dimasak perlahan selama 8 jam dengan santan kental dan 21 rempah pilihan khas Minang hingga meresap sempurna.',
                'img' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=600&auto=format&fit=crop&q=80',
                'is_active' => true,
            ],
            [
                'name' => 'Es Kelapa Muda Jeruk',
                'category_id' => 2, // Minuman
                'price' => 15000,
                'description' => 'Minuman segar kelapa muda dipadukan dengan perasan jeruk murni.',
                'img' => 'https://images.unsplash.com/photo-1546173159-315724a31696?w=600&auto=format&fit=crop&q=80',
                'is_active' => true,
            ],
            [
                'name' => 'Es Teh Manis',
                'category_id' => 2, // Minuman
                'price' => 5000,
                'description' => 'Es teh manis segar khas Nusantara pelepas dahaga.',
                'img' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=600&auto=format&fit=crop&q=80',
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
