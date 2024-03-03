<?php

namespace App\Enums\User;

use App\Enums\AbstractEnum;

class UserStatusEnum extends AbstractEnum
{
    const PENDING = 'pending';
    const ACTIVE = 'active';
    const SUSPENDED = 'suspended';
    const DEACTIVATED = 'deactivated';
}
