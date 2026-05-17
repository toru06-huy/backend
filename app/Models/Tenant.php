<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';
    protected $fillable = [
        'full_name',
        'phone',
        'identity_card',
        'address',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'tenant_id', 'id');
    }
}
