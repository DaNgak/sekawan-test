<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'number_series',
        'bbm_consume',
        'service_schedule',
        'type_transport_id',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeTransport::class, 'type_transport_id', 'id');
    }

    public function order(): HasMany
    {
        return $this->hasMany(OrderTransport::class, 'transport_id', 'id');
    }
}
