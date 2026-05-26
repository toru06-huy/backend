<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
        'contract_id',
        'utility_id',
        'room_price',
        'electric_total',
        'water_total',
        'total_amount',
        'status'
    ];

   
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }
 
    public function utility()
    {
        return $this->belongsTo(Utility::class, 'utility_id', 'id');
    }
}
