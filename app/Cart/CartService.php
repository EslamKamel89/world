<?php
namespace App\Cart;

use App\Cart\Contracts\CartInterface;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Session\SessionManager;
use \App\Models\Cart;

class CartService implements CartInterface {

	use \App\Traits\Pr;


	/**
	 * @var Cart|null
	 */
	protected ?Cart $cartModel = null;


	public function __construct( protected SessionManager $session ) {
	}
	/**
	 * Summary of create
	 * @param ?User $user
	 * @return void
	 */
	public function create( ?User $user ) {
		/** @var Cart $instance*/
		$instance = new Cart();
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
	 * @return Cart
	 */
	public function instance(): Cart|null {
		if ( ! $this->cartModel ) {
			$uuid = $this->session->get( config( 'cart.session.key' ) );
			$this->cartModel = Cart::with(
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
		// dd( $this->contents()->count() );
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

	public function changeCount( Variation $variation, int $quantity ) {
		// dd( $variation, $quantity );
		$this->instance()->variations()->updateExistingPivot( $variation->id, [ 
			'quantity' => min( $quantity, $variation->stockCount() )
		] );
	}
	public function remove( Variation $variation ) {
		$this->instance()->variations()->detach( $variation->id );
	}
	public function isEmpty() {
		return $this->instance()->variations->isEmpty();
	}

	public function subtotal(): int|null {
		$variations = $this->instance()->variations;
		$sum = $variations->reduce( function (?int $carry, Variation $variation) {
			return ( $variation->price + $variation->pivot->quantity ) + ( $carry ?? 0 );
		} );
		return $sum;
	}
	public function formatedSubtotal() {
		return money( $this->subtotal() / 100 );
	}
}
