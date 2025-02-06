<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Database\Factories\productFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product query()
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int $price
 * @property string|null $live_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereLiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Variation> $variations
 * @property-read int|null $variations_count
 * @mixin \Eloquent
 */
class product extends Model {
	use HasFactory;
	protected $fillable = [ 
		'title',
		'slug',
		'description',
		'price',
		'live_at',
	];

	public function formattedPrice(): string {
		return money( $this->price );
	}
	public function variations(): HasMany {
		return $this->hasMany( Variation::class);
	}
}
