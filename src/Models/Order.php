<?php

namespace Sil2\Vidflex\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $dates = [
        'cancelled_at', 'processed_at', 'closed_at'
    ];

    protected $casts = [
        'cancelled_at' => 'datetime',
        'processed_at' => 'datetime',
        'closed_at'    => 'datetime'
    ];

    public function user()
    {
        $pivotTable = config('auth.providers.users.model');
        return $this->belongsTo($pivotTable, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
