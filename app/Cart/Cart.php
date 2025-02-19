<?php
namespace App\Cart;

use App\Cart\Contracts\CartInterface;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Session\SessionManager;
use \App\Models\Cart as CartModel;

class Cart implements CartInterface {


	/**
	 * @var CartModel|null
	 */
	protected ?CartModel $cartModel = null;


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
		if ( ! $this->cartModel ) {
			$uuid = $this->session->get( config( 'cart.session.key' ) );
			$this->cartModel = CartModel::with(
				[ 'variations.ancestorsAndSelf', 'variations.product', 'variations.media', 'variations.descendantsAndSelf.stocks' ]
			)->whereUuid( $uuid )->first();
		}
		return $this->cartModel;
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

	public function add( Variation $variation, int $quantity = 1 ) {
		if ( $existingVariation = $this->getExistingVariation( $variation ) ) {
			$quantity = $existingVariation->pivot->quantity + $quantity;
		}
		$this->instance()->variations()->syncWithoutDetaching( [ 
			$variation->id => [ 
				'quantity' => min( $quantity, $existingVariation?->stockCount() ?? 1 ),
			]
		] );
	}

	public function getExistingVariation( Variation $variation ) {
		return $this->instance()->variations->find( $variation->id );
	}
}
