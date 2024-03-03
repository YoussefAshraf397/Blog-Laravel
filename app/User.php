<?php

namespace App;

use App\Enums\User\UserTypeEnum;
use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeAdmins(Builder $q): Builder
    {
        return $q->where("type", UserTypeEnum::ADMIN);
    }
}
