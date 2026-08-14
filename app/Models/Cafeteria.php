<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Cafeteria extends Model
{
    use HasFactory;

    // public function artist(): BelongsTo
    // {
    //     return $this->belongsTo(::class);
    // }

    // public function songs(): HasMany
    // {
    //     return $this->hasMany(Song::class);
    // }

    protected $fillable = [
        'name',
        'img',
        'is_vip',
        'address',
        'phone',
        'working_hours',
    ];

    public function drinks(): HasMany
    {
        return $this->hasMany(Drink::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Reviews::class);
    }
}
