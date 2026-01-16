<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Product::create(['name' => 'Laptop', 'price' => 50000, 'stock' => 10, 'vendor_id' => 2]);
        // Product::create(['name' => 'Mouse', 'price' => 500, 'stock' => 50, 'vendor_id' => 2]);
        // Product::create(['name' => 'Phone', 'price' => 25000, 'stock' => 15, 'vendor_id' => 3]);
        Product::factory()->count(30)->create();
    }
}
