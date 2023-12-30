<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'category_id', 'icon_id', 'description'];
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function icon(): BelongsTo {
        return $this->belongsTo(Icon::class);
    }
    public function itemTemplate(): BelongsTo {
        return $this->belongsTo(ItemTemplate::class);
    }
}
