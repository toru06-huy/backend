<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    protected $table = 'utilities';
    protected $fillable = [
        'room_id',
        'month',
        'electric_old',
        'electric_new',
        'water_old',
        'water_new',
    ];
    protected $casts = [
        'month'        => 'integer',
        'electric_old' => 'integer',
        'electric_new' => 'integer',
        'water_old'    => 'integer',
        'water_new'    => 'integer',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

     public function invoices()
    {
        return $this->hasMany(Invoice::class, 'utility_id', 'id');
    }
    
     public function getTotalElectric(): int
    {
        return $this->electric_new - $this->electric_old;
    }
    public function getTotalWater(): int
    {
        return $this->water_new - $this->water_old;
    }
}
