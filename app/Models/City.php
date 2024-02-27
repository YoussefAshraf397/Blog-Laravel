<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

}
