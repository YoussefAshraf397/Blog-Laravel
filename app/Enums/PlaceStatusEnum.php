<?php

namespace App\Enums;

class PlaceStatusEnum extends AbstractEnum
{
    const PENDING = 'pending';
    const UPDATE_PENDING = 'update_pending';
    const ACTIVE = 'active';
    const SUSPENDED = 'suspended';
}
