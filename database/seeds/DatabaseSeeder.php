<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('transactions')->insert(['total' => 200000]);
        DB::table('categories')->insert(['name' => 'pangan']);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'kopi',
            'stock' => 30,
            'price' => 20000
            ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'susu',
            'stock' => 20,
            'price' => 30000
            ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 1,
            'quantity' => 10,
            'history' => 0
            ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 2,
            'product_id' => 1,
            'quantity' => 20,
            'history' => 0
            ]);
        DB::table('transaction_details')->insert([
            'transaction_id' => 3,
            'product_id' => 2,
            'quantity' => 10,
            'history' => 0
            ]);
    }
}
