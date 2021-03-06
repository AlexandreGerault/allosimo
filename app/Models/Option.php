<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(OptionCategory::class, 'option_category_id');
    }
}
