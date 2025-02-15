<?php

namespace App\Livewire;

use App\Cart\Cart as CartService;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Livewire\Actions\Logout;

class Navigation extends Component {
	#[Computed ]
	public function cart() {
		$cartService = App::make( CartService::class);
		return $cartService;
	}

	public function logout( Logout $logout ): void {
		session()->invalidate();
		$logout();

		$this->redirect( '/', navigate: true );
	}


	public function render() {
		return view( 'livewire.navigation' );
	}
}
