<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
/**
 *
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUuid($value)
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \App\Models\Variation> $variations
 * @property-read int|null $variations_count
 * @mixin \Eloquent
 */
class Cart extends Model {
	/** @use HasFactory<\Database\Factories\CartFactory> */
	use HasFactory;
	protected $fillable = [ 
		'user_id',
		'uuid',
	];

	public static function booted() {
		static::creating( function (Cart $model) {
			$model->uuid = (string) Str::uuid();
		} );
	}
	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}
	public function variations(): BelongsToMany {
		return $this->belongsToMany(
			Variation::class,
			'cart_variation',
			'cart_id',
			'variation_id',

		);
	}
}
