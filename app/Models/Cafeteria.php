<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Cafeteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'name_ru',
        'img',
        'is_vip',
        'address',
        'address_en',
        'address_ru',
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
