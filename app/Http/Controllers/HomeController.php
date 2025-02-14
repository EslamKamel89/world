<?php

namespace App\Http\Controllers;

use App\Cart\Contracts\CartInterface;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function __invoke() {
		$categories = $this->pr( Category::tree()->get()->toTree(), 'Categories tree' );
		return view( 'home', get_defined_vars() );
	}
}
