<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemTemplate extends Model
{
    use HasFactory;

    protected $appends = ['has_item'];
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function icon(): BelongsTo {
        return $this->belongsTo(Icon::class);
    }

    public function item(): HasMany {
        return $this->hasMany(Item::class);
    }

    public function hasItem(): Attribute{
        return Attribute::get(fn () => Item::where('item_template_id', $this->id)->exists());
    }
}
