<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoRawResponse extends Model
{
    protected $table = 'monito_raw_responses';

    protected $fillable = [
        'base_amount',
        'raw_json',
    ];
}
