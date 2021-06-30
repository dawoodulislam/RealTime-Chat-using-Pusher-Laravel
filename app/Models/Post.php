<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function deal()
    {
        return $this->belongsTo('App\Models\Deal');
    }
}
