<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();
        Category::factory()->make([
            'name' => 'Смартфоны',
        ])->save();

        Category::factory()->make([
            'name' => 'Комлектующие',
        ])->save();

        Category::factory()->make([
            'name' => 'Ноутбуки',
        ])->save();

        Category::factory()->make([
            'name' => 'Телевизоры',
        ])->save();

        Product::factory()->make([
            'name' => 'Tecno Spark 5 Pro, 128Gb, Seabed Blue (KD7)',
            'category_id' => 4,
            'number' => '149297',
            'price' => 70000,
            'image' => '1.jpg',
            'in_stock' => 1
        ])->save();

        Product::factory()->make([
            'name' => 'Samsung Galaxy A01 Core, 16Gb, Black (SM-A013F)',
            'category_id' => 4,
            'number' => '149069',
            'price' => 40000,
            'image' => '2.jpg',
            'in_stock' => 1
        ])->save();

        Product::factory()->make([
            'name' => 'Xiaomi Redmi Note 8 Pro, 128Gb, Coral Orange',
            'category_id' => 4,
            'number' => '149050',
            'price' => 110000,
            'image' => '3.jpg',
            'in_stock' => 0
        ])->save();

        Product::factory()->make([
            'name' => 'ASUS VivoBook S433JQ (90NB0RD4-M01240)',
            'category_id' => 6,
            'number' => '149467',
            'price' => 400000,
            'image' => '4.jpg',
            'in_stock' => 1
        ])->save();

        Product::factory()->make([
            'name' => 'ASUS TUF Gaming FA706IU (90NR03K1-M05030)',
            'category_id' => 6,
            'number' => '149469',
            'price' => 620000,
            'image' => '5.jpg',
            'in_stock' => 0
        ])->save();

        Product::factory()->make([
            'name' => 'Видеокарта PCI-E 4096Mb ASUS GTX 1650 TUF Gaming',
            'category_id' => 5,
            'number' => '149248',
            'price' => 95000,
            'image' => '6.jpg',
            'in_stock' => 1
        ])->save();

        Product::factory()->make([
            'name' => 'Телевизор Sony KD-55XG7005',
            'category_id' => 7,
            'number' => '148917',
            'price' => 340000,
            'image' => '7.jpg',
            'in_stock' => 1
        ])->save();
    }
}
