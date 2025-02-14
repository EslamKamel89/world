<?php
namespace App\Cart\Contracts;

use App\Models\User;
interface CartInterface {
	public function create( ?User $user );
	public function exists();
}
