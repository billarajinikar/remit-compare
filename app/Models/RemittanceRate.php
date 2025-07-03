<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemittanceRate extends Model
{
    protected $fillable = [
        'provider_id',
        'from_currency',
        'to_currency',
        'from_country',
        'base_amount',
        'rate',
        'fee',
        'received_amount',
        'transfer_time',
        'affiliate_url',
        'fetched_at',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public $timestamps = false; // Assuming you are only using 'fetched_at' and no 'created_at/updated_at'
}
