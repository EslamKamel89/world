<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create( 'variations', function (Blueprint $table) {
			$table->id();
			$table->foreignId( 'product_id' )->constrained()->cascadeOnDelete();
			$table->string( 'title' );
			$table->integer( 'price' )->unsigned()->default( 0 );
			$table->string( 'type' ); // color , size , etc
			$table->string( 'sku' )->nullable(); // stock keeping unit
			$table->unsignedBigInteger( 'parent_id' )->nullable();
			$table->integer( 'order' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists( 'variations' );
	}
};
