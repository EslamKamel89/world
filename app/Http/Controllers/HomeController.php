<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function __invoke() {
		$categories = $this->pr( Category::tree()->get()->toTree() );
		return view( 'home', get_defined_vars() );
	}
}
