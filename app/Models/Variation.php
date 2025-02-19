<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

/**
 *
 *
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property int $price
 * @property string $type
 * @property string|null $sku
 * @property int|null $parent_id
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\product $product
 * @method static \Database\Factories\VariationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Variation whereUpdatedAt($value)
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Variation|null $parent
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $ancestors The model's recursive parents.
 * @property-read int|null $ancestors_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $ancestorsAndSelf The model's recursive parents and itself.
 * @property-read int|null $ancestors_and_self_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $bloodline The model's ancestors, descendants and itself.
 * @property-read int|null $bloodline_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $childrenAndSelf The model's direct children and itself.
 * @property-read int|null $children_and_self_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $descendants The model's recursive children.
 * @property-read int|null $descendants_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $descendantsAndSelf The model's recursive children and itself.
 * @property-read int|null $descendants_and_self_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $parentAndSelf The model's direct parent and itself.
 * @property-read int|null $parent_and_self_count
 * @property-read \App\Models\Variation|null $rootAncestor The model's topmost parent.
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $siblings The parent's other children.
 * @property-read int|null $siblings_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $siblingsAndSelf All the parent's children.
 * @property-read int|null $siblings_and_self_count
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation depthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation doesntHaveChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation treeOf(\Illuminate\Database\Eloquent\Model|callable $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder<static>|Variation withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stock> $stock
 * @property-read int|null $stock_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stock> $stocks
 * @property-read int|null $stocks_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @mixin \Eloquent
 */
class Variation extends Model implements HasMedia {
	/** @use HasFactory<\Database\Factories\VariationFactory> */
	use HasFactory, HasRecursiveRelationships, \App\Traits\Pr, InteractsWithMedia;
	protected $fillable = [ 
		'product_id',
		'title',
		'price',
		'type',
		'sku',
		'parent_id',
		'order',
	];

	protected static function booted(): void {
		static::addGlobalScope( 'stocks', function (Builder $builder) {
			$builder->with( [ 'stocks' ] );
		} );
	}

	public function formattedPrice(): string {

		return money( $this->price );
	}

	public function stockCount() {
		return $this->descendantsAndSelf
			->sum(
				fn( Variation $variation ) => $variation->stocks->sum( 'amount' )
			);
	}

	public function inStock(): bool {
		return $this->stockCount() > 0;
	}

	public function outOfStock(): bool {
		return ! $this->inStock();
	}

	public function lowStock(): bool {
		return $this->inStock() && $this->stockCount() < 5;
	}

	public function product(): BelongsTo {
		return $this->belongsTo( Product::class);
	}

	public function stocks(): HasMany {
		return $this->hasMany( Stock::class);
	}

	public function carts(): BelongsToMany {
		return $this->belongsToMany(
			Cart::class,
			'cart_variation',
			'variation_id',
			'cart_id'
		)->withPivot( 'quantity' )->withTimestamps();
	}

}
