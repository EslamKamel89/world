<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		Category::insert( [ 
			[ 'title' => 'Brands', 'slug' => 'brands', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now() ],
			[ 'title' => 'Seassons', 'slug' => 'seassons', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now() ],
			[ 'title' => 'Nike', 'slug' => 'nike', 'parent_id' => 1, 'created_at' => now(), 'updated_at' => now() ],
			[ 'title' => 'Summer', 'slug' => str( 'Summer' )->slug(), 'parent_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
			[ 'title' => 'Winter', 'slug' => str( 'Winter' )->slug(), 'parent_id' => 2, 'created_at' => now(), 'updated_at' => now() ],
		] );
	}
}
