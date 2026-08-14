<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'user_id',
        'cafeteria_id',
        'total_price',
        'status',
        'payment_method',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'total_price' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cafeteria(): BelongsTo
    {
        return $this->belongsTo(Cafeteria::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING => 'Garaşylýar',
            self::STATUS_PROCESSING => 'Taýýarlanylýar',
            self::STATUS_COMPLETED => 'Tamamlandy',
            self::STATUS_CANCELLED => 'Ýatyryldy',
        ];
    }

    public function statusLabel(): string
    {
        return self::statuses()[$this->status] ?? $this->status;
    }

    public function statusBadgeClass(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING => 'bg-warning text-dark',
            self::STATUS_PROCESSING => 'bg-info text-dark',
            self::STATUS_COMPLETED => 'bg-success',
            self::STATUS_CANCELLED => 'bg-secondary',
            default => 'bg-light text-dark',
        };
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }
}
