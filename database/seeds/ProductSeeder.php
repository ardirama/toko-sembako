<?php

use App\Product;
use Illuminate\Database\Seeder;

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
            'category_id' => 1,
            'name' => 'Beras',
            'stock' => 1000,
            'price' => 15000
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Garam',
            'stock' => 500,
            'price' => 7000
        ]);
    }
}
