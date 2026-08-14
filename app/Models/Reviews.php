<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cafeteria_id',
        'drink_id',
        'rating',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cafeteria(): BelongsTo
    {
        return $this->belongsTo(Cafeteria::class);
    }

    public function drink(): BelongsTo
    {
        return $this->belongsTo(Drink::class);
    }
}
