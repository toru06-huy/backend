<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
    protected $table = 'rooms';
    protected $fillable = [
        'room_number',
        'price',
        'status',
    ];
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'room_id', 'id');
    }
    public function utilities()
    {
        return $this->hasMany(Utility::class, 'room_id', 'id');
    }
}
