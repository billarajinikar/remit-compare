<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [
        'name',
        'main_logo',
        'mobile_logo',
        'url',
        'affiliate_url',
        'status',
    ];

    public $timestamps = true;

    // Relationship: One provider has many remittance rates
    public function remittanceRates()
    {
        return $this->hasMany(RemittanceRate::class, 'provider_id');
    }
}
