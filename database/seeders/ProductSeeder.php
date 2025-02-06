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
			[ 'title' => 'Nike Air Force 1', 'slug' => str( 'Nike Air Force 1' )->slug(), 'description' => "Nike Air Force 1 description " . fake()->text(), 'price' => 800000, 'live_at' => now() ],
		] );
	}
}
