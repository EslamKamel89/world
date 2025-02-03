<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		product::insert( [ 
			[ 'title' => 'Product 1', 'slug' => 'product-1', 'description' => 'Description of product 1', 'price' => 100, 'live_at' => now(),],
			[ 'title' => 'Product 2', 'slug' => 'product-2', 'description' => 'Description of product 2', 'price' => 200, 'live_at' => now(),],
			[ 'title' => 'Product 3', 'slug' => 'product-3', 'description' => 'Description of product 3', 'price' => 300, 'live_at' => now(),],
		] );
	}
}
