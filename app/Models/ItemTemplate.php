<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemTemplate extends Model
{
    use HasFactory;


    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function icon(): BelongsTo {
        return $this->belongsTo(Icon::class);
    }
}
