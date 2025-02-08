<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductShowController extends Controller {
	public function __invoke( product $product ) {
		$product->load( [ 'variations.children' ] );
		return view( 'products.show', get_defined_vars() );
	}
}
