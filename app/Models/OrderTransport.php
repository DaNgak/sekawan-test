<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTransport extends Model
{
    use HasFactory, SoftDeletes;

    // protected $with = ['transport', 'driver', 'boss'];

    protected $fillable = [
        'transport_id',
        'driver_id',
        'boss_id',
        'acceptance_admin',
        'acceptance_boss',
        'order_finish'
    ];

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class, 'transport_id', 'id');
    }

    // Relasi Driver
    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    // Relasi Driver
    public function boss(): BelongsTo
    {
        return $this->belongsTo(User::class, 'boss_id', 'id');
    }
}
