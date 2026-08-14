<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'name_ru',
        'img',
    ];

    public function drinks(): HasMany
    {
        return $this->hasMany(Drink::class);
    }
}
