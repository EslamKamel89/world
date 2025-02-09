<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		Stock::insert( [ 
			'variation_id' => 3,
			'amount' => 10,
			'created_at' => now(),
			'updated_at' => now(),
		] );
	}
}
