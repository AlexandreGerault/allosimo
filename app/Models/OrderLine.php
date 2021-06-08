<?php

namespace App\Models;

use App\Collections\OrderLinesCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrderLine extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getPriceAttribute()
    {
        return $this->product->price * $this->quantity + $this->options->reduce(
                fn(int $acc, Option $option) => $acc + $option->price * $this->quantity,
                0
            );
    }

    public function newCollection(array $models = []): OrderLinesCollection
    {
        return new OrderLinesCollection($models);
    }
}
