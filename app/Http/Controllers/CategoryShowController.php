<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryShowController extends Controller {
	public function __invoke( Category $category ) {
		return view( 'categories.show', get_defined_vars() );
	}
}
