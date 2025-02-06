<?php

namespace Database\Seeders;

use App\Models\Variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		Variation::insert( [ 
			[ 
				'product_id' => 1,
				'title' => 'Black',
				'price' => 9000,
				'type' => 'color',
				'sku' => null,
				'parent_id' => null,
				'order' => 1,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[ 
				'product_id' => 1,
				'title' => 'Blue',
				'price' => 9000,
				'type' => 'color',
				'sku' => null,
				'parent_id' => null,
				'order' => 2,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[ 
				'product_id' => 1,
				'title' => 8,
				'price' => 9000,
				'type' => 'size',
				'sku' => 'sku.' . fake()->numberBetween( 1000, 10000 ),
				'parent_id' => 1,
				'order' => 1,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[ 
				'product_id' => 1,
				'title' => 9,
				'price' => 9000,
				'type' => 'size',
				'sku' => 'sku.' . fake()->numberBetween( 1000, 10000 ),
				'parent_id' => 1,
				'order' => 2,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[ 
				'product_id' => 1,
				'title' => 8,
				'price' => 9000,
				'type' => 'size',
				'sku' => 'sku.' . fake()->numberBetween( 1000, 10000 ),
				'parent_id' => 1,
				'order' => 2,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[ 
				'product_id' => 1,
				'title' => 9,
				'price' => 9000,
				'type' => 'size',
				'sku' => 'sku.' . fake()->numberBetween( 1000, 10000 ),
				'parent_id' => 2,
				'order' => 2,
				'created_at' => now(),
				'updated_at' => now(),
			],
		] );
	}
}
