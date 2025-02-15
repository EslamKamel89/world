<?php
namespace App\Cart;

use App\Cart\Contracts\CartInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Session\SessionManager;
use \App\Models\Cart as CartModel;

class Cart implements CartInterface {
	public function __construct( protected SessionManager $session ) {
	}
	/**
	 * Summary of create
	 * @param ?User $user
	 * @return void
	 */
	public function create( ?User $user ) {
		/** @var CartModel $instance*/
		$instance = new CartModel();
		if ( $user ) {
			$instance->user()->associate( $user );
		}
		$instance->save();
		$this->session->put( config( 'cart.session.key' ), $instance->uuid );
	}
	/**
	 * Summary of exists
	 * @return bool
	 */
	public function exists(): bool {
		return $this->session->has( config( 'cart.session.key' ) );
	}

	/**
	 * @return CartModel
	 */
	public function instance(): CartModel|null {
		$uuid = $this->session->get( config( 'cart.session.key' ) );
		return CartModel::whereUuid( $uuid )->first();
	}


	/**
	 * @return Collection
	 */
	public function contents(): Collection {
		return $this->instance()->variations;
	}

	/**
	 * @return int
	 */
	public function contentsCount(): int {
		return $this->contents()->count();
	}
}
