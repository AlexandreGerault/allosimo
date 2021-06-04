<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'town', 'logo', 'stars', 'state'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
