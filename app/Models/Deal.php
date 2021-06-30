<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
