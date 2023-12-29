<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Icon extends Model
{
    use HasFactory;

    public function items(): HasMany {
        return $this->hasMany(Item::class);
    }

    public function itemTemplates(): HasMany {
        return $this->hasMany(ItemTemplate::class);
    }
}
