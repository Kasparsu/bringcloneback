<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function itemTemplates(): HasMany {
        return $this->hasMany(ItemTemplate::class);
    }
}
