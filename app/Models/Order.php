<?php

namespace App\Models;

use App\Collections\OrdersCollection;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    const STATES = ['confirmed', 'cancelled'];

    protected $fillable = ['state', 'seen_at'];

    protected $dates = ['seen_at'];

    protected static function boot()
    {
        parent::boot();

        Order::observe(OrderObserver::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function deliveryGuy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'delivery_guy_id');
    }

    public function getPriceAttribute()
    {
        return $this->lines->reduce(fn (int $acc, OrderLine $line) => $acc + $line->price, 0);
    }

    public function newCollection(array $models = []): OrdersCollection
    {
        return new OrdersCollection($models);
    }
}
