<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drink extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cafeteria_id',
        'category_id',
        'image',
        'price',
        'description',
        'weight',
        'is_available',
    ];

    public function cafeteria(): BelongsTo
    {
        return $this->belongsTo(Cafeterias::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Reviews::class);
    }
}
