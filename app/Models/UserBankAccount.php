<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserBankAccount extends Model
{
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
