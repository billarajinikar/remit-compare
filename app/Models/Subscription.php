<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    // app/Models/Subscription.php
protected $fillable = ['email'];
    protected $table = 'subscriptions';
}
