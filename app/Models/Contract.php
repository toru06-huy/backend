<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $fillable = [
        'tenant_id',
        'room_id',
        'start_date',
        'end_date',
        'deposit_amount',
        'status',
    ];

    protected $casts = [
        'start_date'     => 'date',
        'end_date'       => 'date',
        'deposit_amount' => 'decimal:2',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'contract_id', 'id');
    }

}